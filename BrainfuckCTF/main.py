from flask import Flask, render_template, request, send_from_directory
import subprocess
app = Flask(__name__)

@app.route("/")
def index():
    return render_template('form.html')

@app.route("/data/", methods= ['POST'])
def out():
    form_data = request.form.get("Name")
    f = open("a.bf", "w")
    f.write(form_data)
    f.close()
    setup = "python brainfuck.py a.bf"
    setup_output = subprocess.check_output(setup, shell=True)
    output = subprocess.check_output(setup_output, shell=True)
    return output

@app.route("/<path:path>")
def sendstuff(path):
    print(path)
    return send_from_directory('./', path)

if __name__ == "__main__":
    app.run(host="127.0.0.1", port=8080, debug=True)