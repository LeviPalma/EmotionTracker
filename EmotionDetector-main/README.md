# EmotionDetector
This project is based on 5 different types of arduine modules, including a pulse sensor, a Microwave motion sensor, giroscopic/acelerometer, a temperature sensor and a wifi module with its shield.

Respective models of each:

- Amped Pulse Sensor
- RCWL-0516 (Microwave)
- MPU6050-GY521 (Acelerometer)
- LM35Z (Temperature)
- ESP01 8266

All the components and the circuit can be visualized on the "Circuit_drawn.png" and "Circuit_Pictures.png". Also, there's another repository containing all the web-part of the project, including HTML, CSS and PHP.

For initial configuration of ESP 8266, you need to copy this link: https://arduino.esp8266.com/stable/package_esp8266com_index.json

Paste it on board manangement located on Arduino Ide <path>: File > Board Manangement > (paste on link section)
  
 Then, go to: Tools > Board > Boards Mananger and search "esp8266". Download the suggested package as the image below
  ![image](https://user-images.githubusercontent.com/77580555/173907763-dc7b64a2-d355-4b97-b880-a6d09d5bb2b9.png)

