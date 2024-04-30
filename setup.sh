#!/bin/sh
green='\e[1;32m%s\e[0m\n'

set -e

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Please wait until the installation is complete."
  printf "$green" "# "
  printf "$green" "#################################################################"
  echo ""
  
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Setting .env"
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 1
  cp .env.example .env
  
  echo ""
  echo ""
  printf "$green" "##################################################################"
  printf "$green" "# "
  printf "$green" "# Building docker images"
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 5
  docker-compose build

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Starting docker containers."
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 5
  docker-compose up -d sun-asterisk-bulletin

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Installing PHP libraries."
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 5
  docker-compose run --rm composer install

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Installing JS libraries."
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 5
  docker-compose run --rm npm install
  
  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Initialize database and seed data."
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 5
  docker-compose run --rm php artisan migrate:fresh
  sleep 5
  docker-compose run --rm php artisan db:seed --class=UserSeeder

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Bulletin installed! Please wait for NPM Dev to start."
  printf "$green" "# "
  printf "$green" "#################################################################"

  echo ""
  echo ""
  printf "$green" "#################################################################"
  printf "$green" "# "
  printf "$green" "# Run NPM Dev"
  printf "$green" "# "
  printf "$green" "#################################################################"
  sleep 1
  docker-compose run --rm npm run dev
fi
