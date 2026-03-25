## **🛫 Aviation Navigation System**  
A web-based **Aviation Navigation System** that displays **waypoints, navigational aids (NAVAIDs), and ATS routes** on an interactive map using **Google Earth API**.  

### **📌 Features**
✅ Display waypoints (VOR, NDB, FIX) on Google Earth.  
✅ Visualize ATS route network between waypoints.  
✅ Interactive map controls (zoom, pan, and filter).  
✅ Backend in PHP with MySQL for data storage.  
✅ Responsive UI using TailwindCSS.  

---

## **🛠️ Tech Stack**
| Component    | Technology Used |
|-------------|----------------|
| **Frontend** | HTML, TailwindCSS, JavaScript, Google Earth API |
| **Backend**  | PHP |
| **Database** | MySQL |
| **Version Control** | Git & GitHub |

---

## **🚀 Setup Instructions**
### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/anandku06/aviation-nav.git
cd aviation-nav
```

### **2️⃣ Install Dependencies**
- **Backend (PHP & MySQL)**: Install **XAMPP** (or any local server).  
- **Frontend:** Ensure you have **Google Earth API** access.  

### **3️⃣ Set Up Database**
1. Open **phpMyAdmin**.
2. Create a **database** named `aviation_db`.
3. Import `sql/aviation_db.sql` into MySQL.

### **4️⃣ Start Development Server**
- **Start Apache & MySQL in XAMPP**.
- Place the project in `htdocs/` and access it via:  
  ```
  http://localhost/aviation-nav/frontend/index.php
  ```

---

## **📂 Project Structure**
```
/aviation-nav
  ├── backend/
  │   ├── db.php               # Database connection
  │   ├── getWaypoints.php      # Fetch waypoints from DB
  │   ├── getRoutes.php         # Fetch ATS routes from DB
  ├── frontend/
  │   ├── index.php            # Main UI
  │   ├── style.css             # TailwindCSS styles
  │   ├── script.js             # Google Earth API integration
  ├── sql/
  │   ├── aviation_db.sql       # Database schema
  ├── README.md                 # Project documentation
```

---

## **🔗 API Endpoints**
### **Get Waypoints**
```http
GET /backend/getWaypoints.php
```
_Response:_
```json
[
  {
    "id": 1,
    "name": "DELHI-VOR",
    "latitude": 28.5665,
    "longitude": 77.1031,
    "altitude": 0,
    "type": "VOR"
  }
]
```

### **Get ATS Routes**
```http
GET /backend/getRoutes.php
```
_Response:_
```json
[
  {
    "route_name": "A1",
    "start_waypoint": "DELHI-VOR",
    "end_waypoint": "MUMBAI-NDB",
    "path_coordinates": [
      {"lat": 28.5665, "lon": 77.1031},
      {"lat": 19.0887, "lon": 72.8679}
    ]
  }
]
```

---

## **👥 Team Collaboration (GitHub Workflow)**
1. **Clone the repo**:
   ```sh
   git clone https://github.com/anandku06/aviation-nav.git
   ```
2. **Create a new branch**:
   ```sh
   git checkout -b feature-name
   ```
3. **Make changes & commit**:
   ```sh
   git add .
   git commit -m "Added waypoints API"
   ```
4. **Push to GitHub**:
   ```sh
   git push origin feature-name
   ```
5. **Create a Pull Request (PR) on GitHub**.

---

## **📌 Future Enhancements**
✅ Live flight tracking integration.  
✅ Admin dashboard for waypoint management.  
✅ User authentication for pilots & ATC users.  

---

## **📜 License**
This project is **open-source** under the **MIT License**.  

🚀 **Happy coding!** Let’s build the best aviation navigation system! 🛫
