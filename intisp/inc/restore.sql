CREATE TABLE FailedLogin (
id INT CHECK (id > 0) AUTO_INCREMENT PRIMARY KEY, 
ip TEXT,
time TEXT
);
CREATE TABLE Mail (
id INT CHECK (id > 0) AUTO_INCREMENT PRIMARY KEY, 
subject TEXT,
message TEXT
);
CREATE TABLE Cloudflare (
id INT CHECK (id > 0) AUTO_INCREMENT PRIMARY KEY, 
username TEXT,
email TEXT,
password TEXT
)
CREATE TABLE Users (
id INT CHECK (id > 0) AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(1000),
password TEXT,
bandwidth TEXT,
diskspace TEXT,
port TEXT
);
CREATE TABLE Settings (
id INT CHECK (id > 0) AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
);
INSERT INTO Mail (id, subject, message) VALUES ('1','Welcome To Webister','<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>
If you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>');
INSERT INTO Settings (id, code, value) VALUES ('1', 'title', 'My Web Host')