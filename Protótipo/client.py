import requests
 
api_url = 'http://127.0.0.1:8090/farmacias'
api_ent_url = 'http://127.0.0.1:8090/entregadores'
api_entregas_url = 'http://127.0.0.1:8090/entregas'

#FARMACIAS
def get_farmacias():
    response = requests.get(api_url)
    print(response.json())
 
def insert_farmacia():
    insert = {"nome_farmacia": "Sao Jose", "email": "farmsaojose22@gmail.com", "cnpj" : "46.113.925/0001-40",
    "telefone": "84-912345678", "rua": "Outra", "numero" :323, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    #{"nome_farmacia": "Pague menos", "email": "paguemenos@gmail.com", "cnpj" : "56.237.228/0001-54",
    #"telefone": "84-987654321", "rua": "Qualquer uma", "numero" :213, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    response = requests.post(api_url, json=insert)
    print(response.json())

def get_farmacia_by_id(id):
    api_url = f"http://127.0.0.1:8090/farmacias/{id}"
    response = requests.get(api_url)
    print(response.json())

def update_farmacia(id):
    farmacia = {"nome_farmacia": "Drogavida", "email": "drogavida2022@gmail.com", "cnpj" : "12.455.697/0001-74",
    "telefone": "84-938746529", "rua": "Nova", "numero" :220, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    api_url = f"http://127.0.0.1:8090/farmacias/{id}"
    response = requests.put(api_url, json=farmacia)
    print(response.json())

def delete_farmacia(id):
    api_url = f"http://127.0.0.1:8090/farmacias/{id}"
    response = requests.delete(api_url)
    print(response)

#ENTREGADORES
def get_entregadores():
    response = requests.get(api_ent_url)
    print(response.json())
 
def insert_entregador():
    insert = {"nome": "Joao Chaves", "cpf" : "123.456.789-13", "email": "joaoch22@gmail.com", "telefone": "84-937560932"}
    #{"nome": "Jose Silva", "cpf" : "123.455.697-74", "email": "joses2022@gmail.com", "telefone": "84-984750923"}
    response = requests.post(api_ent_url, json=insert)
    print(response.json())

def get_entregador_by_id(id):
    api_ent_url = f"http://127.0.0.1:8090/entregadores/{id}"
    response = requests.get(api_ent_url)
    print(response.json())

def update_entregador(id):
    entregador = {"nome": "José Silva", "cpf" : "123.455.697-78", "email": "joses22@gmail.com", "telefone": "84-984750923"}
    api_ent_url = f"http://127.0.0.1:8090/entregadores/{id}"
    response = requests.put(api_ent_url, json=entregador)
    print(response.json())

def delete_entregador(id):
    api_ent_url = f"http://127.0.0.1:8090/entregadores/{id}"
    response = requests.delete(api_ent_url)
    print(response)

#ENTREGAS
def get_entregas():
    response = requests.get(api_entregas_url)
    print(response.json())
 
def insert_entrega():
    insert = {"id_cliente": 1, "id_entregador": 2, "nome" : "Maria Alves",
    "entrega_status": "pendente", "rua": "Rua nova", "numero" :246, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    #{"id_cliente": 1, "id_entregador": 1, "nome" : "João Bosco","entrega_status": "pendente", "rua": "Qualquer", "numero" :345, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    response = requests.post(api_entregas_url, json=insert)
    print(response.json())

def get_entrega_by_id(id):
    api_entregas_url = f"http://127.0.0.1:8090/entregas/{id}"
    response = requests.get(api_entregas_url)
    print(response.json())

def update_entrega(id):
    entrega = {"id_cliente": 1, "id_entregador": 1, "nome" : "João Bosco", "entrega_status": "entregue", "rua": "Qualquer", "numero" :345, "bairro" : "Centro", "cidade" : "Pau dos Ferros"}
    api_entregas_url = f"http://127.0.0.1:8090/entregas/{id}"
    response = requests.put(api_entregas_url, json=entrega)
    print(response.json())

def delete_entrega(id):
    api_entregas_url = f"http://127.0.0.1:8090/entregas/{id}"
    response = requests.delete(api_entregas_url)
    print(response)

#FARMÁCIAS
#get_farmacias()
#insert_farmacia()
#get_farmacias()
#get_farmacia_by_id(1)
#update_farmacia(4)
#delete_farmacia(6)

#ENTREGADORES
#get_entregadores()
#insert_entregador()
#get_entregadores()
#get_entregador_by_id(1)
#update_entregador(1)
#delete_entregador(4)

#ENTREGAS
#get_entregas()
#insert_entrega()
get_entregas()
#get_entrega_by_id(1)
#update_entrega(1)
#delete_entrega(3)