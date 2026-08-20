# Cloud Lab 5 – RDS CRUD Application

## Overview

This project demonstrates a PHP application hosted on an AWS EC2
instance connected to an Amazon RDS MySQL database.

## Architecture

User
↓
EC2 Instance
├── Apache
├── PHP-FPM
└── PHP CRUD Application
        ↓
     TCP 3306
        ↓
Amazon RDS MySQL

## AWS Components

- Amazon EC2
- Apache Web Server
- PHP / PHP-FPM
- Amazon RDS MySQL
- EC2 Security Group
- RDS Security Group

## Database

Database: `college_registration`

### Tables

#### departments

- department_id
- department_name

#### students

- student_id
- name
- email
- phone
- department_id

`students.department_id` references `departments.department_id`.

## Security

The RDS instance is not publicly accessible.

Inbound MySQL traffic on port 3306 is allowed only from the
EC2 Security Group.

No `0.0.0.0/0` access is configured.

## CRUD Operations

The EC2-hosted PHP application demonstrates:

- Create – Add a student
- Read – Display students
- Update – Modify student details
- Delete – Remove a student

## Database Connection

The PHP application connects to RDS using:

- RDS endpoint
- MySQL port 3306
- Database name
- Database credentials

Sensitive credentials are not included in the repository.

## Deployment Summary

1. Created an Amazon RDS MySQL instance.
2. Configured an RDS Security Group.
3. Allowed port 3306 only from the EC2 Security Group.
4. Created the `college_registration` database.
5. Created the `departments` and `students` tables.
6. Connected the PHP application running on EC2 to RDS.
7. Demonstrated all CRUD operations.

## Application URL

`http://http://65.0.108.126//rds_crud.php`
