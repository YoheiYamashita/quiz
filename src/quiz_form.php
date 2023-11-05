<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規作成</title>
    <!-- <link rel="stylesheet" type="text/css" href="./views/css/create.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="../dist/output.css?<?php echo date('Ymd-Hi'); ?>">

    
</head>

<body>
    <div class="container flex flex-col  items-center">
        
    <div class="mb-3  bg-gray-500 w-screen text-center py-3 text-white sticky top-0  flex flex-row justify-center items-center">
            <div class="text-3xl">クイズを新規作成</div>
            <div class="absolute right-16"> <a class="ml-32 bg-blue-400 p-3 rounded-lg  hover:bg-blue-500" href="./quiz_admin.php">管理トップページに戻る</a></div>

        </div>

    <form action="quiz_create.php" method="POST" enctype="multipart/form-data">



        <div class="flex flex-row justify-center items-center mx-3 my-5 w-full">
            <div class="block w-10">質問</div>
            <input name="question"  class="bg-gray-50 rounded-lg block border-collapse border-2 border-gray-400 w-full hover:bg-gray-100"></input>
        </div>
        
        <table class="table-auto border-collapse border border-slate-400 w-auto">
            <thead class="" >
                
                <tr>
                    <td class="border border-slate-300 text-center font-bold py-3">項目</td>
                    <td class="border border-slate-300 text-center font-bold">選択肢1</td>
                    <td class="border border-slate-300 text-center font-bold">選択肢2</td>
                    <td class="border border-slate-300 text-center font-bold">選択肢3</td>
                </tr>
            </thead>
            <tbody>
                
                <tr  class="">
                    <td class="border border-slate-300 text-center py-3">選択肢</td>
                    <td class="border border-slate-300 items-center"><input name="response_1" class="bg-gray-50 rounded-lg block border-collapse border-2 border-gray-400 w-full hover:bg-gray-100"></input></td>
                    <td class="border border-slate-300"><input name="response_2" class="bg-gray-50 rounded-lg block border-collapse border-2 border-gray-400 w-full hover:bg-gray-100"></input></td>
                    <td class="border border-slate-300"> <input name="response_3" class="bg-gray-50 rounded-lg block border-collapse border-2 border-gray-400 w-full hover:bg-gray-100"></input></td>
                </tr>
                <tr >
                    <td class="border border-slate-300 text-center py-3">画像</td>
                    <td class="border border-slate-300 text-center"> <input type="file" name="response_pic_1"></td>
                    <td class="border border-slate-300 text-center"> <input type="file" name="response_pic_2"></td>
                    <td class="border border-slate-300 text-center"> <input type="file" name="response_pic_3"></td>
                </tr>
                <tr >
                    <td class="border border-slate-300 text-center py-3">正答</td>
                    <td class="border border-slate-300 text-center"><input type="radio" name="correct_answer" value="1"></td>
                    <td class="border border-slate-300 text-center"><input type="radio" name="correct_answer" value="2"></td>
                    <td class="border border-slate-300 text-center"><input type="radio" name="correct_answer" value="3"></td>
                </tr>
            </tbody>
        </table>

        <br>
        <div class="flex flex-row justify-center items-center my-3">

            <input type="submit" name="img_upload" value="決定" class="cursor-pointer rounded-lg bg-red-400 hover:bg-red-500 p-3 mx-3 h-max text-white">
           
        </div> 
    </form>
        </div>
</body>

</html>