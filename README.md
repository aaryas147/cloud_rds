# Cloud Lab 5 – Assignment 1: Joomla with Amazon RDS

## Overview

This project demonstrates the deployment and connection of an Amazon RDS MySQL database to the Joomla application running on an AWS EC2 instance.

The Lab 4 Joomla application originally used a local MariaDB database on the EC2 instance. In Assignment 1, the Joomla database was migrated to Amazon RDS while keeping the Joomla application running on the same EC2 instance.

## Architecture

Browser
   ↓
EC2 Instance
   ↓
Apache + PHP
   ↓
Joomla Application
   ↓
Amazon RDS MySQL
   ↓
joomla_db

## AWS Components

- Amazon EC2
- Joomla
- Apache Web Server
- PHP
- Amazon RDS MySQL
- EC2 Security Group
- RDS Security Group

## Database Migration

The original Joomla database was stored locally on the EC2 instance as:

- Database: `joomla_db`
- Database type: MariaDB/MySQL
- Host: `localhost`

A complete backup of the Joomla database was created and imported into Amazon RDS.

The Joomla application was then configured to use the RDS endpoint instead of the local database server.

## RDS Configuration

- Engine: MySQL
- Database: `joomla_db`
- Port: `3306`
- Application: Joomla
- Host: Amazon RDS endpoint

Sensitive database credentials are not stored in this repository.

## Security

The RDS database is not publicly accessible.

Inbound MySQL traffic on port 3306 is restricted to the EC2 Security Group.

The Joomla application running on EC2 connects to RDS through the private AWS network.

## CRUD Operations

CRUD operations were demonstrated through the Joomla application running on EC2:

- Create – Create a Joomla article
- Read – View the article
- Update – Modify the article
- Delete – Delete the article

## Application URL

http://15.252.16.88

## Deployment Summary

1. Used the existing Lab 4 EC2 instance running Joomla.
2. Identified the Joomla database stored in local MariaDB.
3. Created a backup of the Joomla database.
4. Created an Amazon RDS MySQL database.
5. Imported the Joomla database into RDS.
6. Created a dedicated RDS database user for Joomla.
7. Configured Joomla to connect to the RDS endpoint.
8. Verified that Joomla continued to operate normally.
9. Demonstrated Create, Read, Update and Delete operations through Joomla.

## Repository

GitHub:
https://github.com/aaryas147/cloud_rds
