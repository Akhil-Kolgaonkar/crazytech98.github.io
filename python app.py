from flask import Flask, render_template, request
import yfinance as yf
import numpy as np
from sklearn.linear_model import LinearRegression

app = Flask(__name__)

@app.route("/", methods=["GET", "POST"])
def index():
    if request.method == "POST":
        # Get company ticker from form data
        ticker = request.form["ticker"]
        # Get historical data for the company
        company_data = yf.Ticker(ticker)
        company_history = company_data.history(period="max")
        # Preprocess data for model training
        company_history["Year"] = company_history.index.year
        X = company_history[["Year"]]
        y = company_history["Close"]
        # Train linear regression model
        model = LinearRegression()
        model.fit(X, y)
        # Make prediction for next year's closing price
        next_year = np.array([[company_history.index.year.max() + 1]])
        next_year_prediction = model.predict(next_year)[0]
        # Render the index template with prediction result
        return render_template("index.html", ticker=ticker, prediction=next_year_prediction)
    # Render the index template without prediction result
    return render_template("index.html")

if __name__ == "__main__":
    app.run(debug=True)
