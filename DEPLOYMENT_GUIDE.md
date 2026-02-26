# Deployment Guide

This guide provides step-by-step instructions for deploying the application.

## Prerequisites
- Ensure you have Python 3.8+ installed.
- Install the required dependencies:
  ```bash
  pip install -r requirements.txt
  ```

## Deployment Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/enockIT-dev/enock.git
   cd enock
   ```
2. Set up environment variables:
   - Create a `.env` file based on the example provided (`.env.example`).
   - Update the values as necessary.
3. Run migrations:
   ```bash
   python manage.py migrate
   ```
4. Start the server:
   ```bash
   python manage.py runserver
   ```

## Additional Information
- For further details, refer to the official documentation.
- Contact the development team for support.  

***

Last updated: 2026-02-26 10:41:05 (UTC)