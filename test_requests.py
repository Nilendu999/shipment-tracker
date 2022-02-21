import requests
import time
from datetime import datetime
url = "http://localhost/fyp/insertdata.php"


for i in range(5):
    data = {'time': datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        'temp': "22.6",
        'humidity': "10.6",
        'jerk': "4.19"}
    print("sending at "+data['time'])
    req = requests.post(url=url,data=data)
    time.sleep(1)
    print("return : %s\n"%req.text)