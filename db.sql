-- Create database if not exists
CREATE DATABASE IF NOT EXISTS donation_project;

-- Use the database
USE donation_project;

-- Create table users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create table contactus
CREATE TABLE IF NOT EXISTS contactus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    YourName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(255) NOT NULL,
    Subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

-- Create table emg
CREATE TABLE IF NOT EXISTS emg (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobileno VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    Donatething VARCHAR(255) NOT NULL,
    thing1 VARCHAR(255) NOT NULL,
    thing2 VARCHAR(255) NOT NULL,
    amount VARCHAR(255) NOT NULL,
    date DATE NOT NULL
);

-- Create table ind
CREATE TABLE IF NOT EXISTS ind (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobileno VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    Donatething VARCHAR(255) NOT NULL,
    thing1 VARCHAR(255) NOT NULL,
    thing2 VARCHAR(255) NOT NULL,
    amount VARCHAR(255) NOT NULL,
    date DATE NOT NULL
);

-- Create table org
CREATE TABLE IF NOT EXISTS org (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobileno VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    Donatething VARCHAR(255) NOT NULL,
    thing1 VARCHAR(255) NOT NULL,
    thing2 VARCHAR(255) NOT NULL,
    amount VARCHAR(255) NOT NULL,
    date DATE NOT NULL
);


CREATE TABLE IF NOT EXISTS requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100),
    state VARCHAR(100),
    donation_for VARCHAR(255) NOT NULL,
    specify_need VARCHAR(255) NOT NULL,
    other_specify VARCHAR(255),
    estimated_amount DECIMAL(10, 2) NOT NULL,
    expected_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


