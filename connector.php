const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', 
    password: '', 
    database: 'uniroomie_db'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to the database');
});


app.post('/submit-preferences', (req, res) => {
    const {
        sleepSchedule,
        bedTime,
        wakeTime,
        sleepHours,
        studyPreference,
        musicTolerance,
        conversationTolerance,
        gamesTolerance,
        shareBelongings,
        lifestyleDescription,
        gamingComfort,
        cleanliness,
        privacy,
        spacePreference,
        guestsComfort,
        foodMind,
        bringFood,
        diet,
        dietOtherText
    } = req.body;

    const query = `
        INSERT INTO user_preferences (
            sleep_schedule, bed_time, wake_time, sleep_hours, study_preference,
            music_tolerance, conversation_tolerance, games_tolerance,
            share_belongings, lifestyle_description, gaming_comfort,
            cleanliness, privacy, space_preference, guests_comfort,
            food_mind, bring_food, diet, diet_other
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const values = [
        sleepSchedule, bedTime, wakeTime, sleepHours, studyPreference,
        musicTolerance, conversationTolerance, gamesTolerance,
        shareBelongings, lifestyleDescription, gamingComfort,
        cleanliness, privacy, spacePreference, guestsComfort,
        foodMind, bringFood, diet, dietOtherText
    ];

    db.query(query, values, (err, result) => {
        if (err) {
            console.error(err);
            return res.status(500).send('Error saving preferences');
        }
        res.status(200).send('Preferences saved successfully');
    });
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(Server running on http://localhost:${PORT});
});
