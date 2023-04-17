import pandas as pd
import mysql.connector

# Read the data from the datasets
air_force_1 = pd.read_csv('Datasets/air_force_1.csv')
jordan_1 = pd.read_csv('Datasets/jordan_1.csv')
jordan_4 = pd.read_csv('Datasets/jordan_4.csv')

# Get all the columns that we need, drop null values, and get the top 20
air_force_1 = air_force_1[['value', 'data.image_url', 'data.retail_price_cents_eur']].dropna()[:20]
jordan_1 = jordan_1[['value', 'data.image_url', 'data.retail_price_cents_eur']].dropna()[:20]
jordan_4 = jordan_4[['value', 'data.image_url', 'data.retail_price_cents_eur']].dropna()[:20]

# Change the column of the price to EUR from cents
air_force_1['data.retail_price_cents_eur'] = air_force_1['data.retail_price_cents_eur'] / 100
jordan_1['data.retail_price_cents_eur'] = jordan_1['data.retail_price_cents_eur'] / 100
jordan_4['data.retail_price_cents_eur'] = jordan_4['data.retail_price_cents_eur'] / 100


mydb = mysql.connector.connect(
    host='localhost',
    user='root',
    password='',
    database='sneakers'
)

mycursor = mydb.cursor()

query = 'INSERT INTO sneakers (model, image, price) VALUES (%s, %s, %s)'

for index, row in air_force_1.iterrows():
    val = (row[0], row[1], row[2])
    mycursor.execute(query, val)

for index, row in jordan_1.iterrows():
    val = (row[0], row[1], row[2])
    mycursor.execute(query, val)

for index, row in jordan_4.iterrows():
    val = (row[0], row[1], row[2])
    mycursor.execute(query, val)


mydb.commit()

mydb.close()
