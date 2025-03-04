CREATE TABLE user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sleep_schedule VARCHAR(50),
    bed_time TIME,
    wake_time TIME,
    sleep_hours INT,
    study_preference VARCHAR(50),
    music_tolerance INT,
    conversation_tolerance INT,
    games_tolerance INT,
    share_belongings VARCHAR(50),
    lifestyle_description TEXT,
    gaming_comfort VARCHAR(50),
    cleanliness INT,
    privacy VARCHAR(50),
    space_preference VARCHAR(50),
    guests_comfort VARCHAR(50),
    food_mind VARCHAR(50),
    bring_food VARCHAR(50),
    diet VARCHAR(50),
    diet_other TEXT
);
