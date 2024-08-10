<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controlers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tblivros;


 class TblivrosController extends Controller 
{
    //constrir o crud.
    //mostrtar todos os regfistros da tabela livros
   
    public function index(){
        $registroBook = tblivros::All(); // $QUERY = "Select * From tblivro;"
        $contador = $registroBook ->count();

        return 'Livros: '.$contador.$registroBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }


   
    //mostrar um tipo de registro especifico
    //crud -> Read (leitura)Select/ Visualisar

    public function show(string $id) //Função com parametro id
    {
        $registroBook = tblivros::find($id); 

        if($registroBook)//retorna o livro localizado
        {
            return'Livros Localizados: '.$registroBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else //Não retorna
        {
            return 'Livros não Localizados: '.$registroBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        


    }


    //Cadastrar Registos
    //crud -> Create(criar/Cadastrar)
    public function store(Request $request){
        

        $registroVerifica = Validator::make($registroBook,[
           'nomeLivro' =>'required' ,
        ]);
          

            if($registroVerifica->fails())
            {
                return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }
            if($registroBook)//retorna o livro localizado
            {
                return'Livros Localizados: '.$registroBook.Response()->json([],Response::HTTP_NO_CONTENT);
            }else //Não retorna
            {
                return 'Livros não Localizados: '.$registroBook.Response()->json([],Response::HTTP_NO_CONTENT);
            }
        

    }


     //Alterar registros
    //crud -> update(Alterar)
    public function update(){

    }

      //Deletar registros
    //crud -> deletar(
    public function destroy(){

    }
}
