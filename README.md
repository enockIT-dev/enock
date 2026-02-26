# Enock - Milk Collection & Sales Management System

## 📋 Project Overview

**Enock** is a comprehensive PHP-based web application designed for managing milk collection and sales operations. It provides farmers and distributors with tools to track milk inventory, manage customer orders, and generate detailed reports.

### 🎯 Key Features
- **Milk Collection Tracking**: Record milk collection from farmers with dates and quantities
- **Sales Management**: Track milk sales to customers with transaction history
- **Inventory Management**: Real-time inventory overview and stock tracking
- **Dashboard Reports**: Generate comprehensive reports and analytics
- **Customer Management**: Create, update, and delete customer records
- **Farmer Management**: Manage farmer profiles and collection data

---

## 🛠️ Technology Stack

| Component | Technology |
|-----------|-----------|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP 7.4+ / 8.0+ |
| **Database** | MySQL 5.7+ |
| **Server** | Apache with mod_rewrite |
| **Deployment** | Docker & Docker Compose |

---

## 📦 Project Structure

```
enock/
├── index.html              # Landing page
├── dashboard.php           # Main dashboard & reports
├── collect.php             # Milk collection interface
├── seles.php               # Sales management
├── inventory.php           # Inventory tracking
├── database.php            # Database configuration
├── update_customer.php     # Customer update functionality
├── delete_customer.php     # Customer deletion
├── update_farmer.php       # Farmer profile updates
├── delete_farmer.php       # Farmer deletion
├── .env.example            # Environment variables template
├── docker-compose.yml      # Docker services configuration
├── Dockerfile              # PHP application container
├── DEPLOYMENT_GUIDE.md     # Detailed deployment instructions
└── README.md               # This file
```

---

## 🚀 Quick Start (Local Development)

### Option 1: Using Docker (Recommended for Students)

#### Prerequisites
- Install [Docker](https://www.docker.com/)
- Install [Docker Compose](https://docs.docker.com/compose/)

#### Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/enockIT-dev/enock.git
   cd enock
   ```

2. **Set up environment variables**
   ```bash
   cp .env.example .env
   ```
   Edit `.env` with your database credentials

3. **Start Docker containers**
   ```bash
   docker-compose up -d
   ```

4. **Access the application**
   - Open browser: `http://localhost`

### Option 2: Using Railway (Cloud - FREE)

1. Sign up at [Railway.app](https://railway.app/)
2. Connect GitHub repo
3. Add PHP and MySQL services
4. Deploy in 5 minutes!

---

## 🌐 FREE Deployment Options

### **Railway (Best for Students)** ⭐
- **Cost**: FREE ($5/month credits)
- **Setup time**: 5 minutes
- **Features**: Auto-deploy, free MySQL, easy scaling

### **Render.com**
- **Cost**: FREE tier available
- **Setup time**: 10 minutes
- **Features**: GitHub integration, auto-deploy

### **Google Cloud Run**
- **Cost**: FREE tier with limits
- **Setup time**: 15 minutes
- **Features**: Serverless, scalable

---

## ✨ Features & FURPS+ Compliance

### ✅ Functionality
- Complete CRUD operations
- Real-time inventory tracking
- Advanced search & filtering
- Automated reporting
- Data validation

### ✅ Usability
- Clean, intuitive interface
- Responsive design
- Simple navigation
- Color-coded buttons
- Mobile-friendly

### ✅ Reliability
- Error handling
- Connection recovery
- Input validation
- Secure queries
- Transaction support

### ✅ Performance
- Optimized queries
- Fast load times
- Efficient algorithms
- Lightweight resources

### ✅ Supportability
- Well-documented code
- Clear structure
- Environment config
- Docker support

### ✅ Security
- SQL injection prevention
- XSS protection
- Input sanitization
- Secure credentials

---

## 🚀 Deploy Now!

Ready to go live? Follow these steps:

1. Sign up at [Railway.app](https://railway.app/)
2. Connect your GitHub repo
3. Set environment variables
4. Click Deploy!

Your app will be live in minutes!

**Deploy URL Format**: `https://your-project.up.railway.app`

---

**Last Updated**: 2026-02-26 10:42:55  
**Status**: ✅ Ready for Deployment