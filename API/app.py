from tkinter import E
from config import app
from flask_cors import CORS
from routes import Entregadores,Entregas,Farmacias,Auditoria


cors = CORS(app)

if __name__ == '__main__':
  app.register_blueprint(Farmacias.app)
  app.register_blueprint(Entregadores.app)
  app.register_blueprint(Entregas.app)
  app.register_blueprint(Auditoria.app)
  app.run(debug=True, host="0.0.0.0", port=8090)