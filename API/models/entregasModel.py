from config import db
from .entities import Entregas
from flask import jsonify, request
from pycep_correios import get_address_from_cep, WebService, exceptions
import re
from datetime import date
from sqlalchemy import func

def get_todas_entregas(current_user):
  entregas = Entregas.query.all()
  return jsonify([entrega.to_json() for entrega in entregas]), 200

def get_by_id(current_user,id):
  entregas = Entregas.query.get(id)
  if entregas is None:
    return "Not found", 404
  return jsonify(entregas.to_json())

def get_entregas_farma(current_user,id_entrega, id_cliente):
  entregas = Entregas.query.filter_by(id_entrega = id_entrega, id_cliente = id_cliente).first()
  if entregas is None:
    return {"error": "Not found"}, 404
  return jsonify(entregas.to_json())

def insert(current_user):
  if request.is_json:
    body = request.get_json()
    entregas = Entregas (
    )

    if('cep' in body):
      cepDestino = tratarCep(body['cep'])
      if(verificaCep(cepDestino) == ''):
          
          return {"error": "CEP destino inválido"}, 400
      else:
          cepNum = verificaCep(cepDestino)
          
          valor = calculaEntrega(cepNum)
          print(valor)
          print(cepNum)
          entregas.cidade = cepNum # insere o nome da cidade referente ao  cep informado na coluna cidade do BD          
          entregas.preco =  valor 

    if("id_cliente" in body):
      entregas.id_cliente = body['id_cliente'], 
    if("medicamento" in body):
      entregas.medicamento = body['medicamento'],
    if("nome" in body):
      entregas.nome = body['nome'],
    if("rua" in body):
      entregas.rua = body['rua'],
    if("numero" in body):
      entregas.numero = body['numero'],
    if("bairro" in body):
      entregas.bairro = body['bairro'],
    if("cep" in body):
      entregas.cep = body['cep'],
    
    db.session.add(entregas)
    db.session.commit()
    return jsonify(entregas.to_json()), 201
  return {"error": "Request must be JSON"}, 415

def update(current_user,id):
  if request.is_json:
    body = request.get_json()
    entrega = Entregas.query.get(id)
    if entrega is None:
      return "Not found", 404
    if("medicamento" in body):
      entrega.medicamento = body["medicamento"]
    if("nome" in body):
      entrega.nome = body["nome"]
    if("rua" in body):
      entrega.rua = body["rua"]
    if("numero" in body):
      entrega.numero = body["numero"]
    if("bairro" in body):
      entrega.bairro = body["bairro"]
    if("cep" in body):
      entrega.cep = body["cep"]
    if("active" in body):
      entrega.active = body["active"]
    if("id_cliente" in body):
      entrega.id_cliente = body["id_cliente"]
    if("id_entregador" in body):
      entrega.id_entregador = body["id_entregador"]
    if("entrega_status" in body):
      entrega.entrega_status = body["entrega_status"]
    db.session.add(entrega)
    db.session.commit()
    return "atualizado com sucesso", 200
  return {"error": "Request must be JSON"}, 415

def delete(current_user,id):
  entrega = Entregas.query.get(id)
  if entrega is None:
      return "Not found", 404
  entrega.active = False
  db.session.add(entrega)
  db.session.commit()
  return "deletado com sucesso", 200

def get_client_by_id(current_user,id_cliente):
  entrega = Entregas.query.filter_by(id_cliente=id_cliente).all()
  if entrega is None:
    return "Not found", 404
  return jsonify([entregas.to_json() for entregas in entrega]), 200

# Tratamento e API CEP 
def tratarCep(cep):
    #coloca um limite de caracteres na variável
    saida = cep[0:9]
    #retira caracteres, deixando só os números
    cepTratado = re.sub(r"[^0-9]","", saida)
    
    return cepTratado

def verificaCep(cepRecebido):
    try:
        cep = get_address_from_cep(cepRecebido, webservice=WebService.CORREIOS)
        cidadeCep = cep['cidade']
        
    except exceptions.InvalidCEP as eic:
        print(eic)
        return eic

    except exceptions.CEPNotFound as ecnf:
        print(ecnf)
        return ecnf

    except exceptions.ConnectionError as errc:
        print(errc)
        return errc

    except exceptions.Timeout as errt:
        print(errt)
        return errt

    except exceptions.HTTPError as errh:
        print(errh)
        return errh

    except exceptions.BaseException as e:
        print(e)
        return e
        
    return cidadeCep

def calculaEntrega(destino):   
    valorEntrega = 0
    if destino == 'Pau dos Ferros':
        valorEntrega = 10

    if destino == 'Encanto' or destino == 'Rafael Fernandes' or destino == 'Francisco Dantas':
        valorEntrega = 20      
        
    if destino == 'Riacho de Santana' or destino == 'José da Penha':
        valorEntrega = 30      

    return valorEntrega

def get_relatorio(id):
  EntregasAno = Entregas.query.filter(Entregas.id_cliente == id, Entregas.active == 'True',Entregas.created_at > date(2022, 8, 10)).count()
  entregasEfetuadas = Entregas.query.filter_by(entrega_status = 'Entregue', id_cliente = id).count()
  EntregasCanceladas = Entregas.query.filter(Entregas.id_cliente == id, Entregas.active == 'False',Entregas.created_at > date(2022, 8, 10)).count()
  EntregasEmAndamento = Entregas.query.filter_by(entrega_status = 'Em andamento', id_cliente = 1).count()
  valorEntregas = Entregas.query.with_entities(func.sum(Entregas.preco).label('total')).filter(Entregas.id_cliente == 1, Entregas.active == 'True').first().total  #(Entregas.id_cliente == 1,Entregas.active == 'True',Entregas.preco).sum()
  relatorio = {
    "totalEntregas": EntregasAno,
    "entregasRealizadas": entregasEfetuadas,
    "totalCancel": EntregasCanceladas,
    "totalAndamento": EntregasEmAndamento,
    "totalFrete": valorEntregas
  }
  
  print(relatorio)
  return jsonify(relatorio)
  