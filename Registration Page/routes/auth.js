// routes/auth.js

const express = require('express');
const router = express.Router();

const User = require('../models/User');

// Register a new user
router.post('/register', (req, res) => {
  const { username, email, password } = req.body;

  const newUser = new User({ username, email, password });

  newUser.save((err) => {
    if (err) {
      console.log(err);
      res.status(500).json({ message: 'Registration failed' });
    } else {
      res.status(200).json({ message: 'Registration successful' });
    }
  });
});

module.exports = router;
