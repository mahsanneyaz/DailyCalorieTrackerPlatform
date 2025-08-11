# 🥗 Daily Calorie Tracker Platform

> **A simple, privacy-focused web tool for tracking daily calorie intake**  
> No database • No login • Works entirely in your browser session using PHP

---

## 📌 Overview  

The **Daily Calorie Tracker Platform** helps you quickly log and monitor your daily calorie consumption.

**Features:**
- ✅ Select a food item from a predefined list
- ✅ Enter quantity in grams & get instant calorie calculation
- ✅ Maintain a running log for the current session
- ✅ View total daily calories
- ✅ One-click log reset

**Tech Stack:**
- **HTML** – Structure
- **CSS** – Dark theme, responsive styling
- **PHP** – Form handling, logic, and session storage
- **No database** – Works fully in PHP sessions

---

## 🖥️ Getting Started (Local Setup)

### 1. Clone the repository
git clone https://github.com/mahsanneyaz/DailyCalorieTrackerPlatform.git

### 2. Move to server directory  
Copy the project folder into your local server's root (e.g., `htdocs` in XAMPP).

### 3. Start the server  
Run **Apache** via XAMPP (or any PHP-enabled web server).

### 4. Open in browser  
Navigate to:
http://localhost/DailyCalorieTrackerPlatform/

---

## 📂 Project Structure

| File                | Description |
|---------------------|-------------|
| `index.php`         | Handles UI, form submission, validation, and session storage |
| `calorie_data.php`  | PHP array mapping foods to calories per 100g |
| `style.css`         | Dark, responsive theme styling |
| `logo.png`, `BG.png`| Visual assets |

---

## ⚙️ How It Works

1. **Form Submission (POST)**  
   - User selects a food item & enters quantity.
   
2. **Validation**  
   - PHP ensures valid selection & numeric quantity.

3. **Calorie Calculation**  
   - Formula:  
     ```
     Calories = (Quantity in grams / 100) × caloriesPer100g
     ```

4. **Session Storage**  
   - Entries stored in `$_SESSION['log']`.
   
5. **Post-Redirect-Get**  
   - Prevents re-submission on refresh.

6. **Display**  
   - Table shows all entries & total calories.

7. **Reset**  
   - Clears session log with a button click.

---

## 🌟 Future Enhancements

- 🔹 User authentication & profiles
- 🔹 Nutrition API integration (dynamic food database)
- 🔹 Search & category-based filtering
- 🔹 Charts for daily/weekly trends
- 🔹 MySQL-based persistent storage

---

## 🤝 Contributing

We welcome contributions!  
You can:
- Report bugs 🐛
- Suggest new foods or features 🍏
- Improve UI/UX 🎨
- Implement one of the **future enhancements** 🚀

---

## 🧑‍💻 Developers

**Mohammad Ahsan Neyaz** & **Harshit**  
_BCA Semester 2, SRM University, Sonepat_

---

> “Track your calories. Stay healthy. Stay informed.” 💪
