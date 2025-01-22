# Symfony + MySQL + Docker + Coolify Example

This repository demonstrates a **Symfony** microservice with **Nginx + PHP-FPM** in one container and **MySQL** in another, all orchestrated by Docker Compose. It includes:

- Basic Symfony routes: `"/"` and `"/about"`.  
- A **health check** endpoint (`"/healthz"`) for container readiness checks.  
- **Swagger (OpenAPI)** documentation using NelmioApiDocBundle.  
- Example GitHub Actions workflow to build, test, and push a Docker image.  
- Optional guidance for deploying with **Coolify**.

## Table of Contents

1. [Project Structure](#project-structure)  
2. [Requirements](#requirements)  
3. [Installation & Usage](#installation--usage)  
4. [Endpoints](#endpoints)  
5. [Environment Variables](#environment-variables)  
6. [Running Tests](#running-tests)  
7. [Swagger Documentation](#swagger-documentation)  
8. [Health Checks](#health-checks)  
9. [Deployment with Coolify](#deployment-with-coolify)  
10. [License](#license)

---

## Requirements

- **Docker** & **Docker Compose**  
- **Git** (optional, for cloning)  
- **Composer** (optional, if you want to manage dependencies locally—otherwise done inside container)  

---

## Installation & Usage

1. **Clone** the repository:
   ```bash
   git clone https://github.com/your-username/your-project.git
   cd your-project

2. Build & Start containers:
 docker-compose up --build

3.Access the application:
  By default, Symfony is available at http://localhost:8080.
  MySQL is available internally at db:3306 (from the Symfony container).
  Optionally exposed on localhost:3307 (per docker-compose.yml).



Réflexion pendant 4 secondes
Below is the raw Markdown for the README. You can copy and paste this directly into a README.md file in your project:

markdown
Copier
# Symfony + MySQL + Docker + Coolify Example

This repository demonstrates a **Symfony** microservice with **Nginx + PHP-FPM** in one container and **MySQL** in another, all orchestrated by Docker Compose. It includes:

- Basic Symfony routes: `"/"` and `"/about"`.  
- A **health check** endpoint (`"/healthz"`) for container readiness checks.  
- **Swagger (OpenAPI)** documentation using NelmioApiDocBundle.  
- Example GitHub Actions workflow to build, test, and push a Docker image.  
- Optional guidance for deploying with **Coolify**.

## Table of Contents

1. [Project Structure](#project-structure)  
2. [Requirements](#requirements)  
3. [Installation & Usage](#installation--usage)  
4. [Endpoints](#endpoints)  
5. [Environment Variables](#environment-variables)  
6. [Running Tests](#running-tests)  
7. [Swagger Documentation](#swagger-documentation)  
8. [Health Checks](#health-checks)  
9. [Deployment with Coolify](#deployment-with-coolify)  
10. [License](#license)

---

## Project Structure

```
. ├─ docker/ │ ├─ php-nginx/ │ │ ├─ Dockerfile │ │ └─ nginx.conf │ └─ database/ │ └─ Dockerfile ├─ src/ │ ├─ Controller/ │ │ ├─ DefaultController.php │ │ └─ HealthController.php │ ├─ Entity/ │ ├─ Repository/ ├─ templates/ │ ├─ default/ │ │ ├─ home.html.twig │ │ └─ about.html.twig ├─ tests/ │ └─ ExampleTest.php ├─ docker-compose.yml ├─ composer.json ├─ README.md └─ ...
```
---

## Requirements

- **Docker** & **Docker Compose**  
- **Git** (optional, for cloning)  
- **Composer** (optional, if you want to manage dependencies locally—otherwise done inside container)  

---

## Installation & Usage

   git clone https://github.com/your-username/your-project.git
   cd your-project
Build & Start containers:

bash
Copier
docker-compose up --build
This will build both containers (Symfony+Nginx and MySQL) and start them.
Access the application:

By default, Symfony is available at http://localhost:8080.
MySQL is available internally at db:3306 (from the Symfony container).
Optionally exposed on localhost:3307 (per docker-compose.yml).

Endpoints
GET /
  Displays a homepage with a welcome message and a list of products (if you have them in the DB).

GET /about
  A simple "About" page with sample text.

GET /api/docs
Swagger UI for API documentation (see Swagger Documentation).

Running Tests
  We have an example PHPUnit test in tests/ExampleTest.php:

Install dependencies (if not already):
docker-compose exec app composer install

Run tests:
docker-compose exec app ./vendor/bin/phpunit
