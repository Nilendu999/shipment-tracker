import requests
import time
from datetime import datetime
url = "http://localhost/fyp/insertdata.php"


for i in range(1):
    data = {'datetime': datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        'latitude': "10.009",
        'longitude': "11.022",
        'temperature': "32.6",
        'humidity': "12.6",
        'acceleration_x': "0",
        'acceleration_y': "1",
        'acceleration_z': "9.81"}
    print("sending at "+data['datetime'])
    req = requests.post(url=url,data=data)
    time.sleep(1)
    print("return : %s\n"%req.text)