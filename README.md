# Lando notification wrapper for MacOS
# Purpose
Display MacOS notifications for certain [lando](https://github.com/lando/lando) commands.

This is written in PHP after after an unsuccessfull attempt to implement it with a bash function. Calling lando from a bash function yielded puzzling behavior.

# Installation
1. In a terminal session type `export LW_LANDO_REAL_PATH=$(which lando)`
2. If you add your lando sites/apps to `~/Sites/lando` type `export LW_LANDO_SITES_PATH_MATCH=Sites/lando`
3. Optionally add the above environment variables to your shell profile.
4. Copy the file 'lando' from this project to a directory in your $PATH which is searched earlier than
the directory where lando is installed (`$LW_LANDO_REAL_PATH`). 
5. Make sure the 'lando' file you just copied is executable. (`chmod +x lando`)
6. If you have an existing terminal session, logout and then log back in.

# Usage
To suppress notifications use `--no-notify` or `-N`.