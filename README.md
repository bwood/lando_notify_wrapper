# Lando notification wrapper for MacOS
# Purpose
Display MacOS notifications for certain [lando](https://github.com/lando/lando) commands.

This is written in PHP after after an unsuccessfull attempt to implement it with a bash function. Calling lando from a bash function yielded puzzelling behavior.

# Installation
- Copy the file 'lando' to a directory in your $PATH that is searched earlier than
the directory where lando is installed. 
- Make sure the file is executable.
- If you have an existing terminal session, logout and then log back in. 