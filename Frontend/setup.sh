#!/bin/bash

echo "🚀 Starting Job Portal Frontend Setup..."
echo ""

# Check if .env exists
if [ ! -f .env ]; then
    echo "📝 Creating .env file from .env.example..."
    cp .env.example .env
fi

echo "🐳 Building Docker containers..."
docker-compose build

echo ""
echo "🚢 Starting Docker containers..."
docker-compose up -d

echo ""
echo "⏳ Waiting for services to be ready..."
sleep 10

echo ""
echo "📦 Installing dependencies inside container..."
docker-compose exec frontend npm install

echo ""
echo "✅ Setup complete!"
echo ""
echo "📊 Service Status:"
docker-compose ps

echo ""
echo "🌐 Application URLs:"
echo "   - Frontend: http://localhost:8001"
echo "   - MySQL: localhost:3308"
echo "   - Redis: localhost:6380"
echo ""
echo "📝 Useful commands:"
echo "   - View logs: docker-compose logs -f frontend"
echo "   - Stop services: docker-compose down"
echo "   - Restart: docker-compose restart"
echo ""
