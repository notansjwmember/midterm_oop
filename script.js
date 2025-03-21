const mysql = require("mysql2/promise");
const { faker } = require("@faker-js/faker");

// MySQL database connection settings
const dbConfig = {
  host: "127.0.0.1", // Fix the typo from "127.0.01"
  user: "root",
  password: "skibiditoilet", // Update with your MySQL password
  database: "oop_php", // Update with your database name
};

// Generate 15 users
const generateUsers = async (count = 5) => {
  const users = [];
  const genders = ["male", "female", "other"];

  for (let i = 0; i < count; i++) {
    const firstName = faker.person.firstName();
    const lastName = faker.person.lastName();
    const email = faker.internet.email({ firstName, lastName }).toLowerCase();
    const gender = faker.helpers.arrayElement(genders);
    const birthdate = faker.date
      .birthdate({ min: 18, max: 50, mode: "age" })
      .toISOString()
      .split("T")[0]; // Format YYYY-MM-DD
    const username = faker.internet
      .userName({ firstName, lastName })
      .toLowerCase();
    const password = faker.internet.password(12);
    const country = faker.location.country();

    users.push([
      firstName,
      lastName,
      email,
      gender,
      birthdate,
      username,
      password,
      country,
    ]);
  }

  return users;
};

// Insert users into the database
const insertUsers = async () => {
  const connection = await mysql.createConnection(dbConfig);

  const sql = `
    INSERT INTO users 
    (first_name, last_name, email, gender, birthdate, username, password, country) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  `;

  try {
    const users = await generateUsers();
    for (const user of users) {
      await connection.execute(sql, user);
    }
    console.log("✅ 15 users inserted successfully!");
  } catch (error) {
    console.error("❌ Error inserting users:", error.message);
  } finally {
    await connection.end();
  }
};

// Run the script
insertUsers();
