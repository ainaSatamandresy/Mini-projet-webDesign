docker-compose down

# Remove the postgres volume to start fresh
docker volume rm rewriting_postgres_data

# Start the containers again
docker-compose up -d