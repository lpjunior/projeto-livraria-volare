
insert into genero (genero) values ('Masculino');


insert into tipoendereco (tipo) values ('Entrega');


insert into perfil (perfil) values (1);

insert into login (datahora) values ('2018/12/06');


insert into usuarios (nome, sobrenome, email, cpf, datanascimento, ativo, senha, perfil_id, genero_id, login_id)
values ('Thiago', 'Chaves', 'tchaves34@gmail.com', '123456789-00', '2018/02/17', 1, md5(12345678), 2, 1, 1);


insert into endereco (cep, endereco, numero, complemento, bairro, estado, cidade, usuarios_id, TipoEndereco_id)
values ('25715-000', 'R Sem Nome', 1234, 'Casa', 'Jardim Catarina', 'Rio de Janeiro', 'São Gonçalo', 1, 1);


insert into tipotelefone(tipo, Telefone_id) values ('Celular', 1);


insert into telefone (numero, usuarios_id) values ('(21) 9 7958-6294', 1);


insert into tipodecapa (tipodecapa) values ('Dura');


insert into categoria (categoria) values ("Ficção");


insert into idioma (idioma) values ('POR');


insert into subcategorias (assunto) values ('Ufologia');


insert into produto (Categoria_id, titulo, autor, editora, isbn, numeropaginas, sinopse, peso, datapublicacao, fornecedor, preco, quantidade, subcategorias_id, TipoDeCapa_id)
values (1, 'Alien', 'Alan Dean Foster', 'Warner Books', '9782302024618', 271, 'A princípio, mais uma missão como tantas do rebocador Nostromo: abastecer a terra com minério recolhido do espaço exterior. 
Em sua tripulação, formada por sete competentes profissionais, apenas um novato: o oficial de ciências, designado de última hora para compor aquela expedição.
No entanto, o que eles não sabiam era que o Nostromo estava programado para cumprir uma rota diferente, um curso que os levaria a receber um oitavo passageiro, que, com o intuito de se reproduzir, espalharia o asco e o pavor.',
500.0, '1979/06/22', 'Fornecedor_1', 12.99, 10, 1, 1);

insert into status_entrega (status_entrega) values ('Postado');

insert into status_compra (status_compra) values ('Em análise');

insert into pedidos (usuarios_id, data_pedido) values (1, '2018/06/12');


insert into itens_pedido (pedidos_id, produto_id, quantidade, preco) values (1,1,1,'12,99');


insert into itens_reservados (usuarios_id, produto_id, quantidade)
values (1, 1, 1);


insert into interesses (usuarios_id, Categoria_id) values (1,1);


insert into Produto_has_Idioma (produto_id, idioma_id) values (1,1);
  


  
create or replace view vw_cadastro_clientes as

select

usu.nome, 
usu.sobrenome, 
usu.email, 
usu.cpf, 
usu.datanascimento, 
per.perfil, 
ge.genero,
tel.numero as numero_tel,
tipotel.tipo as tipo_telefone,
logs.datahora as ultimo_login,
ender.endereco, 
ender.numero, 
ender.complemento, 
ender.bairro, 
ender.cidade,
ender.estado,
ender.cep,
tipoend.tipo as tipo_endereco,
cat.categoria as interesses

from usuarios usu
inner join genero ge on ge.id = usu.genero_id
inner join perfil per on per.id = usu.perfil_id
left join telefone tel on tel.usuarios_id = usu.id
left join tipotelefone tipotel on tipotel.telefone_id = tel.id
left join login logs  on logs.id = usu.login_id
left join endereco ender on ender.usuarios_id = usu.id
left join tipoendereco tipoend	on tipoend.id = ender.tipoendereco_id
left join interesses inte on inte.usuarios_id = usu.id
left join categoria cat on cat.id = inte.categoria_id;



create or replace view vw_cadastro_produtos as

select

prod.titulo, 
prod.autor, 
prod.editora, 
prod.isbn, 
prod.numeropaginas as numero_paginas, 
prod.sinopse, 
prod.peso, 
prod.datapublicacao as data_publicacao, 
prod.fornecedor, 
tcap.tipodecapa as tipo_capa,
prod.preco, 
prod.quantidade,
cat.categoria,
subc.assunto

from produto prod

inner join categoria cat on cat.id = prod.categoria_id
inner join subcategorias subc on subc.id = prod.subcategorias_id
inner join tipodecapa tcap on tcap.id = prod.tipodecapa_id;




create or replace view vw_compras_realizadas as

select

usu.nome,
usu.cpf,
prod.titulo,
prod.autor,
prod.editora,
'LV'|| ped.id as numero_pedido,
ped.data_pedido,
itped.quantidade,
itped.preco


from usuarios usu
inner join pedidos ped on ped.usuarios_id = usu.id
inner join itens_pedido itped on itped.pedidos_id = ped.id
inner join produto prod on prod.id = itped.produto_id;



select

usu.nome,
prod.titulo,
itres.quantidade

from usuarios usu

inner join itens_reservados itres on itres.usuarios_id = usu.id
inner join produto prod on prod.id = itres.produto_id;




select
titulo,
autor,
editora,
sinopse,
datapublicacao,
preco 

from produto

where titulo like '%n%' or autor like '%n%' or editora like '%n%' or ano = '%79'
order by datapublicacao asc;

--sql de produtos--
select p.isbn, p.editora, i.idioma, p.dimensoes, t.tipodecapa, p.anopublicacao, p.numeropaginas
from produto p
join Produto_has_Idioma p1 on p.id = p1.Produto_id
join idioma i on i.id = p1.Idioma_id
join tipodecapa t on p.TipoDeCapa_id = t.id







