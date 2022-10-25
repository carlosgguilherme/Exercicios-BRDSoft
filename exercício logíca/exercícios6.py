<<<<<<< HEAD
from re import S

import datetime
nome = input("digite seu nome: ")
nome_meio = input("digite seu nome do meio: ")
nome_fim = input("digite seu ultimo nome: ")

nome_todo = f"{nome} {nome_meio} {nome_fim}"
nome_todo_minus = nome_todo.lower()
nome_todo_maius = nome_todo.upper()

nome_teste = nome_todo.title()
for teste in nome_teste:
    if teste.isupper():
        hora_atual = datetime.datetime.now()
        data_atual = hora_atual.strftime('%d/%m/%Y %H:%M:%S')
        print(teste, data_atual)
       

        
=======
nome = input("digite seu nome: ")
nome_meio = input("digite seu nome do meio: ")
nome_fim = input("digite seu ultimo nome: ")

nome_todo = f"{nome} {nome_meio} {nome_fim}"
nome_todo_minus = nome_todo.lower()
nome_todo_maius = nome_todo.upper()

nome_teste = nome_todo.title()
for teste in nome_teste:
    if teste.isupper():
        print(teste)
>>>>>>> 49d93b3cf9b82931085a02131248e66e762fc684
