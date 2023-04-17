import time
import pandas as pd
import requests

url = "https://ac.cnstrc.com/search/Jordan%204"  # Air%20force%201 - Air Force 1

res = []
for page in range(1, 5):
    querystring = {"c":"ciojs-client-2.29.12","key":"key_XT7bjdbvjgECO5d8","i":"a24cf094-be07-48ba-8163-c0bff126efed","s":"1","page":f"{page}","num_results_per_page":"100","sort_by":"price","sort_order":"ascending","_dt":"1681046259697"}

    headers = {
        "authority": "ac.cnstrc.com",
        "accept": "*/*",
        "accept-language": "en-US,en;q=0.9",
        "origin": "https://www.goat.com",
        # "sec-ch-ua": ""Google Chrome";v="111", "Not(A:Brand";v="8", "Chromium";v="111"",
        "sec-ch-ua-mobile": "?0",
        # "sec-ch-ua-platform": ""macOS"",
        "sec-fetch-dest": "empty",
        "sec-fetch-mode": "cors",
        "sec-fetch-site": "cross-site",
        "user-agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36"
    }

    response = requests.request("GET", url, headers=headers, params=querystring)

    data = response.json()


    for p in data['response']['results']:
        res.append(p)


# sneakers_df = pd.json_normalize(res)

#
# sneakers_df.to_csv('Datasets/jordan_4.csv', index=True)
#
# print(response.json()['response']['results'][0]['value'])
# print("Price: ", response.json()['response']['results'][1]['data']['retail_price_cents_eur'] / 100)