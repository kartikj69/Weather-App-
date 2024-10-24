import json
import cgi
import mysql.connector

# Connect to the database
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="Mayac129@nk",
    database="hms"
)

# Handle user registration
def register_user(username, password):
    cursor = db.cursor()
    query = "INSERT INTO users (username, password) VALUES (%s, %s)"
    values = (username, password)
    try:
        cursor.execute(query, values)
        db.commit()
        return True
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return False

# Handle user login
def login_user(username, password):
    cursor = db.cursor()
    query = "SELECT * FROM users WHERE username=%s AND password=%s"
    values = (username, password)
    try:
        cursor.execute(query, values)
        result = cursor.fetchone()
        if result:
            return True
        else:
            return False
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return False

# Load the HTML template
with open("login.html", "r") as f:
    template = f.read()

# Handle incoming requests
form = cgi.FieldStorage()
action = form.getvalue("action")
if action == "register":
    username = form.getvalue("username")
    password = form.getvalue("password")
    if register_user(username, password):
        print("Content-type: application/json\n")
        print(json.dumps(True))
    else:
        print("Content-type: application/json\n")
        print(json.dumps(False))
elif action == "login":
    username = form.getvalue("username")
    password = form.getvalue("password")
    if login_user(username, password):
        print("Content-type: application/json\n")
        print(json.dumps(True))
    else:
        print("Content-type: application/json\n")
        print(json.dumps(False))
else:
    print("Content-type: text/html\n")
    print(template)
