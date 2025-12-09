# Frontend Docker Setup - Step-by-Step Guide

## 📋 Overview

This guide will walk you through setting up the **Job Portal Frontend** with **Vue.js 3**, **Nuxt 3 (SSR)**, and **Docker** - similar to the main-admin setup.

## 🎯 What's Included

### Docker Services

1. **Frontend (Nuxt 3)** - Vue.js SSR application on port 8001
2. **MySQL 8.0** - Database on port 3308
3. **Redis 7** - Cache/session storage on port 6380

### Tech Stack

- **Vue.js 3** with Composition API
- **Nuxt 3** for Server-Side Rendering (SSR)
- **TailwindCSS** for styling
- **Pinia** for state management
- **TypeScript** support
- **Docker & Docker Compose**

## 🚀 Quick Start

### Option 1: Automated Setup (Recommended)

```bash
cd /Users/lokeshsalvi/Workspace/demo-portal/Frontend
./setup.sh
```

This script will:

- Create `.env` file from template
- Build Docker images
- Start all containers
- Install npm dependencies
- Show service status

### Option 2: Manual Setup

```bash
cd /Users/lokeshsalvi/Workspace/demo-portal/Frontend

# 1. Create environment file
cp .env.example .env

# 2. Build Docker images
docker-compose build

# 3. Start containers
docker-compose up -d

# 4. Install dependencies (inside container)
docker-compose exec frontend npm install
```

## 🌐 Access the Application

Once running, access:

- **Frontend**: http://localhost:8001
- **MySQL**: localhost:3308 (user: root, password: root)
- **Redis**: localhost:6380

## 📁 Project Structure

```
Frontend/
├── assets/
│   └── css/
│       └── main.css              # Global styles with TailwindCSS
├── layouts/
│   └── default.vue              # Default layout (header/footer)
├── pages/
│   └── index.vue                # Homepage
├── public/
│   └── favicon.ico              # Site favicon
├── app.vue                      # Root Vue component
├── nuxt.config.ts              # Nuxt configuration
├── tailwind.config.js          # TailwindCSS configuration
├── tsconfig.json               # TypeScript configuration
├── package.json                # Dependencies
├── docker-compose.yml          # Docker Compose config
├── Dockerfile                  # Docker image config
├── .dockerignore               # Docker ignore rules
├── .gitignore                  # Git ignore rules
├── .env.example                # Environment template
├── .env                        # Environment variables
├── setup.sh                    # Automated setup script
└── README.md                   # Documentation
```

## 🔧 Docker Commands

### View Logs

```bash
# All services
docker-compose logs -f

# Frontend only
docker-compose logs -f frontend

# Last 100 lines
docker-compose logs --tail=100 frontend
```

### Container Management

```bash
# Stop containers
docker-compose down

# Restart containers
docker-compose restart

# Rebuild and restart
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### Execute Commands in Container

```bash
# Access container shell
docker-compose exec frontend sh

# Run npm commands
docker-compose exec frontend npm run build
docker-compose exec frontend npm install <package>

# Run Nuxt commands
docker-compose exec frontend npx nuxt generate
```

## 🎨 Customization

### Update Styles

Edit `assets/css/main.css` to customize:

- Color schemes
- Typography
- Custom utility classes

### Add New Pages

Create new `.vue` files in the `pages/` directory:

```bash
# This will be auto-routed to /about
pages/about.vue

# This will be routed to /jobs
pages/jobs.vue
```

### Create Components

Add reusable components in `components/` directory:

```bash
components/JobCard.vue
components/SearchBar.vue
```

They can be used without imports:

```vue
<template>
  <JobCard />
  <SearchBar />
</template>
```

## 🔐 Environment Variables

Key environment variables in `.env`:

| Variable      | Description       | Default       |
| ------------- | ----------------- | ------------- |
| `NODE_ENV`    | Environment mode  | development   |
| `HOST`        | Server host       | 0.0.0.0       |
| `PORT`        | Server port       | 3000          |
| `API_URL`     | Backend API URL   | http://app:80 |
| `DB_HOST`     | Database host     | db            |
| `DB_PORT`     | Database port     | 3306          |
| `DB_DATABASE` | Database name     | job-portal    |
| `DB_USERNAME` | Database user     | root          |
| `DB_PASSWORD` | Database password | root          |

## 🔄 Integration with main-admin

To connect with the main-admin backend:

1. **Update API_URL** in `.env`:

   ```env
   API_URL=http://localhost:8000
   ```

2. **Ensure both are on the same Docker network**:
   Add to `docker-compose.yml`:

   ```yaml
   networks:
     job-portal-network:
       external: true
   ```

3. **Create shared network** (if needed):
   ```bash
   docker network create job-portal-network
   ```

## 🐛 Troubleshooting

### Port Already in Use

```bash
# Find what's using port 8001
lsof -i :8001

# Kill the process
kill -9 <PID>

# Or change the port in docker-compose.yml
ports:
  - "8002:3000"
```

### Container Won't Start

```bash
# Check logs
docker-compose logs frontend

# Remove all containers and rebuild
docker-compose down -v
docker-compose build --no-cache
docker-compose up -d
```

### Dependencies Not Installing

```bash
# Remove node_modules and reinstall
docker-compose exec frontend rm -rf node_modules
docker-compose exec frontend npm install
```

### Cannot Connect to Database

```bash
# Check if MySQL is running
docker-compose ps

# Test connection
docker-compose exec db mysql -uroot -proot -e "SHOW DATABASES;"
```

## 📦 Adding Dependencies

```bash
# Install a new package
docker-compose exec frontend npm install <package-name>

# Install dev dependency
docker-compose exec frontend npm install -D <package-name>

# Example: Install Axios
docker-compose exec frontend npm install axios
```

## 🚢 Production Build

To build for production:

1. **Update Dockerfile**:
   Uncomment the build line:

   ```dockerfile
   RUN npm run build
   ```

2. **Change CMD**:

   ```dockerfile
   CMD ["node", ".output/server/index.mjs"]
   ```

3. **Rebuild**:
   ```bash
   docker-compose build
   docker-compose up -d
   ```

## ✅ Verification Checklist

- [ ] Docker containers are running
- [ ] Frontend accessible at http://localhost:8001
- [ ] Homepage displays correctly
- [ ] No errors in Docker logs
- [ ] MySQL is accessible on port 3308
- [ ] Redis is accessible on port 6380

## 📝 Next Steps

1. **Create more pages** (jobs, companies, about, etc.)
2. **Add API integration** with main-admin backend
3. **Implement authentication** flow
4. **Set up state management** with Pinia
5. **Add multi-tenant** middleware
6. **Integrate theme** system

## 🆘 Common Issues

### Issue: "Cannot find module 'nuxt'"

**Solution**: Install dependencies

```bash
docker-compose exec frontend npm install
```

### Issue: "Port 8001 is already allocated"

**Solution**: Stop existing container or change port

```bash
docker-compose down
# Or edit docker-compose.yml to use different port
```

### Issue: "Module not found" errors

**Solution**: Rebuild with cache clear

```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

## 📚 Resources

- [Nuxt 3 Documentation](https://nuxt.com/docs)
- [Vue.js 3 Guide](https://vuejs.org/guide/)
- [TailwindCSS Docs](https://tailwindcss.com/docs)
- [Docker Compose Reference](https://docs.docker.com/compose/)
- [Pinia State Management](https://pinia.vuejs.org/)

---

**Need help?** Check the logs first: `docker-compose logs -f frontend`
