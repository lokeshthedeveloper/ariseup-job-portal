import zipfile
import xml.etree.ElementTree as ET
import csv
import os

def convert_excel_to_csv(excel_path, output_dir):
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)

    states = {} # name -> id
    districts = [] # (id, name, state_id)
    
    try:
        with zipfile.ZipFile(excel_path, 'r') as z:
            # Load shared strings
            shared_strings = []
            if 'xl/sharedStrings.xml' in z.namelist():
                with z.open('xl/sharedStrings.xml') as f:
                    tree = ET.parse(f)
                    root = tree.getroot()
                    ns = {'ns': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
                    for t in root.findall('.//ns:t', ns):
                        shared_strings.append(t.text)

            # Load sheet1
            with z.open('xl/worksheets/sheet1.xml') as f:
                tree = ET.parse(f)
                root = tree.getroot()
                ns = {'ns': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
                
                rows = root.findall('.//ns:row', ns)
                
                # Skip header (row 1)
                for row in rows[1:]:
                    row_data = []
                    for cell in row.findall('ns:c', ns):
                        val = cell.find('ns:v', ns)
                        cell_val = ""
                        if val is not None:
                            if cell.get('t') == 's':
                                idx = int(val.text)
                                if idx < len(shared_strings):
                                    cell_val = shared_strings[idx]
                            else:
                                cell_val = val.text
                        else:
                            t = cell.find('ns:is/ns:t', ns)
                            if t is not None:
                                cell_val = t.text
                        row_data.append(cell_val)
                    
                    # Expected: State Code, State Name, District Code, District Name
                    if len(row_data) >= 4:
                        state_name = row_data[1].strip()
                        district_name = row_data[3].strip()
                        
                        if state_name not in states:
                            states[state_name] = len(states) + 1
                        
                        state_id = states[state_name]
                        districts.append((len(districts) + 1, district_name, state_id))

        # Write CSVs
        
        # Countries
        with open(os.path.join(output_dir, 'countries.csv'), 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'sortname', 'name', 'phonecode', 'status', 'code'])
            writer.writerow([1, 'IN', 'India', 91, 1, 'IN'])

        # States
        with open(os.path.join(output_dir, 'states.csv'), 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'name', 'country_id', 'status'])
            for name, id in states.items():
                writer.writerow([id, name, 1, 1])

        # Districts
        with open(os.path.join(output_dir, 'districts.csv'), 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'name', 'state_id', 'status'])
            for d in districts:
                writer.writerow([d[0], d[1], d[2], 1])

        # Cities (Mapping District to City for now)
        with open(os.path.join(output_dir, 'cities.csv'), 'w', newline='') as f:
            writer = csv.writer(f)
            writer.writerow(['id', 'name', 'state_id', 'country_id', 'district_id', 'status'])
            for d in districts:
                # id, name, state_id, country_id, district_id, status
                writer.writerow([d[0], d[1], d[2], 1, d[0], 1])

        print(f"Successfully generated CSVs in {output_dir}")
        print(f"States: {len(states)}")
        print(f"Districts: {len(districts)}")

    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    convert_excel_to_csv('public/Country-State-District-City.xlsx', 'database/seeders/data')
