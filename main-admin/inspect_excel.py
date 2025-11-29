import zipfile
import xml.etree.ElementTree as ET
import sys

def inspect_excel(file_path):
    try:
        with zipfile.ZipFile(file_path, 'r') as z:
            # Load shared strings
            shared_strings = []
            if 'xl/sharedStrings.xml' in z.namelist():
                with z.open('xl/sharedStrings.xml') as f:
                    tree = ET.parse(f)
                    root = tree.getroot()
                    ns = {'ns': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
                    for t in root.findall('.//ns:t', ns):
                        shared_strings.append(t.text)

            # List sheets
            print("Sheets:")
            if 'xl/workbook.xml' in z.namelist():
                with z.open('xl/workbook.xml') as f:
                    tree = ET.parse(f)
                    root = tree.getroot()
                    ns = {'ns': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
                    for sheet in root.findall('.//ns:sheet', ns):
                        print(f"- {sheet.get('name')} (id: {sheet.get('sheetId')})")

            # Load sheet1
            print("\nSheet1 Data (First 5 rows):")
            with z.open('xl/worksheets/sheet1.xml') as f:
                tree = ET.parse(f)
                root = tree.getroot()
                ns = {'ns': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
                
                rows = root.findall('.//ns:row', ns)
                for i, row in enumerate(rows[:5]):
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
                                    cell_val = f"String[{idx}]"
                            else:
                                cell_val = val.text
                        else:
                            t = cell.find('ns:is/ns:t', ns)
                            if t is not None:
                                cell_val = t.text
                        row_data.append(cell_val)
                    print(row_data)

    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    inspect_excel('public/Country-State-District-City.xlsx')
