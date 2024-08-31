<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return 'Livros não Localizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        


    }


    //Cadastrar Registos
    //crud -> Create(criar/Cadastrar)
    public function store(Request $request){
        
      
        $registroBook = $request->All();

        $registroVerifica = Validator::make($registroBook,[
           'nomeLivro' =>'required' ,
            'generoLivro' =>'required',
            'anoLivro' => 'required'
        ]);
          

            if($registroVerifica->fails())
            {
                return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
             
            }

            $registroBookCad = tblivros::create($registroBook);

            if($registroBookCad)//retorna o livro localizado
            {
                return'Livros Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }else //Não retorna
            {
                return 'Livros não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }
        

    }


     //Alterar registros
    //crud -> update(Alterar)
    public function update(Request $request, string $id){

        $registroBook = $request->All();

        $registroVerifica = Validator::make($registroBook,[
            'nomeLivro' =>'required' ,
             'generoLivro ' =>'required',
             'anoLivro' => 'required'
 
         ]);

         if ($registroVerifica->fails()) {
            return 'Registros não atualizados'.Response()->json([],Response::HTTP_NO_CONTENT);
         }


         $registroBanco = tblivros::Find($id);
         $registroBanco->nomeLivro = $registroBook['nomeLivro'];
         $registroBanco->generoLivro = $registroBook['generoLivro'];
         $registroBanco->anoLivro =$registroBook['anoLivro'];

         $registroBanco->save();

         if($retorno){
            return "Livro atualizado com suscesso.".Response()->json([],Response::HTTP_NO_CONTENT);
         }else{
            return "Atenção...Erro: Livro não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
         }
        

    }



      //Deletar registros
    //crud -> deletar(
    public function destroy(string $id){

        $registroBook = tblivros::find($id) ;

        if($registroBook->delete()){
            
            return "O livro foi deletado com sucesso";

        }

        return "Algo deu errado: Livro não deletado".response()->json([],Response::HTTP_NO_CONTENT);

    }
}
