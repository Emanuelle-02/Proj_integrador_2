from flask import Flask, request, jsonify
from flask_cors import CORS
import db

app = Flask(__name__)
cors = CORS(app)

#FARMACIAS
@app.route("/farmacias",methods=['GET'])
def get_farmacias():
    farmacias = db.query_db('select * from farmacias')
    return jsonify(farmacias),200

@app.route("/farmacias",methods=['POST'])
def add_farmacia():
    if request.is_json:
        farmacia = request.get_json()
        id = db.insert_clientes(
            (
                farmacia['nome_farmacia'],farmacia['email'], farmacia['cnpj'],farmacia['telefone'], 
                farmacia['rua'],farmacia['numero'], farmacia['bairro'], farmacia['cidade'] 
            )
        )
        return {"id":id}, 201
    return {"error": "Request must be JSON"}, 415

@app.route("/farmacias/<int:id>",methods=['GET'])
def get_farmacia_by_id(id):
    farmacia = db.query_db(f'select * from farmacias where id = {id}')
    return jsonify(farmacia),200

@app.route("/farmacias/<int:id>", methods=["PUT"])
def update_farmacias(id):
    farmacia = request.get_json()
    db.query_db(f'UPDATE farmacias SET nome_farmacia = "{farmacia["nome_farmacia"]}",email = "{farmacia["email"]}", cnpj = "{farmacia["cnpj"]}", telefone = "{farmacia["telefone"]}", rua = "{farmacia["rua"]}", numero = "{farmacia["numero"]}", bairro = "{farmacia["bairro"]}", cidade = "{farmacia["cidade"]}" where id = {id}')
    return jsonify(farmacia), 200

@app.route("/farmacias/<int:id>", methods=["DELETE"])
def delete_farmacia(id):
    db.query_db(f'DELETE from farmacias WHERE id= {id}')
    return 'ok', 200  
#ENTREGAS
@app.route("/entregas",methods=['GET'])
def get_entregas():
    entregas = db.query_db('select * from entregas')
    return jsonify(entregas),200

@app.route("/entregas",methods=['POST'])
def add_entrega():
    if request.is_json:
        entrega = request.get_json()
        id = db.insert_entregas(
            (
            entrega['id_cliente'],entrega['id_entregador'],entrega['nome'],entrega['entrega_status'], 
            entrega['rua'], entrega['numero'], entrega['bairro'],entrega['cidade']
            )
        )
        return {"id":id}, 201
    return {"error": "Request must be JSON"}, 415

@app.route("/entregas/<int:id>",methods=['GET'])
def get_entrega_by_id(id):
    entrega = db.query_db(f'select * from entregas where id_entrega = {id}')
    return jsonify(entrega),200

@app.route("/entregas/<int:id>", methods=["PUT"])
def update_entrega(id):
    entrega = request.get_json()
    db.query_db(f'UPDATE entregas SET id_cliente = "{entrega["id_cliente"]}",id_entregador = "{entrega["id_entregador"]}", nome = "{entrega["nome"]}", entrega_status = "{entrega["entrega_status"]}", rua = "{entrega["rua"]}", numero = "{entrega["numero"]}", bairro = "{entrega["bairro"]}", cidade = "{entrega["cidade"]}" where id_entrega = {id}')
    return jsonify(entrega), 200

@app.route("/entregas/<int:id>", methods=["DELETE"])
def delete_entrega(id):
    db.query_db(f'DELETE from entregas WHERE id_entrega = {id}')
    return 'ok', 200 

#ENTREGADORES
@app.route("/entregadores",methods=['GET'])
def get_entregadores():
    entregador = db.query_db('select * from entregadores')
    return jsonify(entregador),200

@app.route("/entregadores",methods=['POST'])
def add_entregadores():
    if request.is_json:
        entregador = request.get_json()
        id = db.insert_entregador(
            (
            entregador['nome'],entregador['cpf'],
            entregador['email'],entregador['telefone']            )
        )
        return {"id":id}, 201
    return {"error": "Request must be JSON"}, 415

@app.route("/entregadores/<int:id>",methods=['GET'])
def get_entregador_by_id(id):
    entregador = db.query_db(f'select * from entregadores where id_entregador = {id}')
    return jsonify(entregador),200

@app.route("/entregadores/<int:id>", methods=["PUT"])
def update_entregador(id):
    entregador = request.get_json()
    db.query_db(f'UPDATE entregadores SET nome = "{entregador["nome"]}",cpf = "{entregador["cpf"]}", email = "{entregador["email"]}", telefone = "{entregador["telefone"]}" where id_entregador = {id}')
    return jsonify(entregador), 200

@app.route("/entregadores/<int:id>", methods=["DELETE"])
def delete_entregador(id):
    db.query_db(f'DELETE from entregadores WHERE id_entregador = {id}')
    return 'ok', 200 

#AUDITORIA
@app.route("/auditoria",methods=['GET'])
def get_entregas_auditoria():
    auditoria = db.query_db('select * from entregas_auditoria')
    return jsonify(auditoria),200

#PAGAMENTO
@app.route("/entregas/pagamento",methods=['GET'])
def get_entregas_pagamento():
    pagamento = db.query_db('select * from pagamento')
    return jsonify(pagamento),200

@app.route("/entregas/pagamento",methods=['POST'])
def add_pagamento():
    if request.is_json:
        pagamento = request.get_json()
        id = db.insert_pagamento(
            (
            pagamento['id_entrega'],pagamento['forma_pagamento'],
            pagamento['valor_total']            
            )
        )
        return {"id":id}, 201
    return {"error": "Request must be JSON"}, 415

if __name__ == '__main__':
    init_db = False
    
    db.init_app(app)
    
    if init_db:
        with app.app_context():
            db.init_db()
    
    app.run(debug=True,host="0.0.0.0", port=8090)
