
from config import app
from flask_cors import CORS
from routes import entregadores,entregas,farmacias,solicitacoes

cors = CORS(app)

if __name__ == '__main__':

  app.register_blueprint(farmacias.app)
  app.register_blueprint(entregadores.app)
  app.register_blueprint(entregas.app)
  app.register_blueprint(solicitacoes.app)
  app.run(debug=True, host="0.0.0.0", port=8090)