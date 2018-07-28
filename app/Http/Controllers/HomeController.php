<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = json_decode($this->getData());

        $url = 'tsconfig.json';
        $data = file_get_contents($url);
        $elements = json_decode($data);

//        dd ($elements);

//        (new Collection($elements))->downloadExcel('uno.xlxs', null, false);

        $users = [];
        foreach ($elements as $element) {
            foreach ($element as $item) {
                $users[] = $item;
            }
        }

//        $collect = collect($users);
//        (new Collection($users))->downloadExcel('uno.xlxs');
//        (new Collection([[1, 2, 3], [1, 2, 3]]))->storeExcel('uno.xlxs');
//        $csv = 'data.csv';
//        $fp = fopen($csv, 'w');
//
//        foreach ($elements as $element) {
//            fputcsv($fp, $element);
//        }
//
//        fclose($fp);


//        Excel::download(new InvoicesExpert, 'invoices.xlsx');


//        $invoicesArray = new Collection([[1, 2, 3], [1, 2, 3]]);
//        $invoicesArray = $elements;
//        $invoicesArray = $users;
        Excel::create('payments', function ($excel) use ($elements) {
            $excel->setTitle('payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments files');


//            $data = [12,"Hey",123,4234,5632435,"Nope",345,345,345,345];

            $users = [];
            foreach ($elements as $element) {
                foreach ($element as $item) {
                    $users[] = (array)$item;
                }
            }

            $excel->sheet('sheet1', function ($sheet) use ($users) {
                $sheet->fromArray($users);
            });

        })->download('xls');


    }


    /*public function getJson()
    {
        $json = '{                
                    "data": [
                        {
                            "user": {
                                "id": 17,
                                "matricula": "2562",
                                "name": "Roberto Castellanos",
                                "email": "roberto@geekminds.gt",
                                "telefono": "56191670",
                                "nickname": "rcarlsocc",
                                "_code": "GUA-847-vlK",
                                "created_at": "2018-05-28 00:07:36",
                                "updated_at": "2018-05-28 00:07:36",
                                "puntos": 38
                            }
                        },
                        {
                            "user": {
                                "id": 23,
                                "matricula": "666",
                                "name": "Mynor Estuardo Letona Rivera",
                                "email": "letonamynor@gmail.com",
                                "telefono": "42143542",
                                "nickname": "Mynor",
                                "_code": "GUA-058-d1j",
                                "created_at": "2018-05-28 17:32:47",
                                "updated_at": "2018-05-28 17:32:47",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 24,
                                "matricula": "13652",
                                "name": "JIMENEZ ACOSTA ESTEBAN",
                                "email": "eaja1388@hotmail.com",
                                "telefono": "88226105",
                                "nickname": "ESTJIMAC",
                                "_code": "COR-664-4SM",
                                "created_at": "2018-05-28 17:59:57",
                                "updated_at": "2018-05-28 17:59:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 25,
                                "matricula": "111",
                                "name": "VELASQUEZ VELASQUEZ LUIS ANIBAL",
                                "email": "nef.rosal@gmail.com",
                                "telefono": "30334535",
                                "nickname": "nefta",
                                "_code": "GUA-488-kfj",
                                "created_at": "2018-05-28 18:04:22",
                                "updated_at": "2018-05-28 18:04:22",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 26,
                                "matricula": "1",
                                "name": "Luisa Villatoro",
                                "email": "lvillatoro@medpharma.com.gt",
                                "telefono": "57108330",
                                "nickname": "Luisa Fer",
                                "_code": "GUA-492-6U3",
                                "created_at": "2018-05-28 18:20:48",
                                "updated_at": "2018-05-28 18:20:48",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 27,
                                "matricula": "2",
                                "name": "Juan Pérez",
                                "email": "aixcot@medpharma.com.gt",
                                "telefono": "11111111",
                                "nickname": "Juan",
                                "_code": "NIC-479-VHW",
                                "created_at": "2018-05-28 18:24:19",
                                "updated_at": "2018-05-28 18:24:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 28,
                                "matricula": "16075",
                                "name": "QUIÑONEZ DOMINGO EDLER EVERILDO",
                                "email": "ever2764@hotmail.com",
                                "telefono": "56986029",
                                "nickname": "Ever",
                                "_code": "GUA-263-JfF",
                                "created_at": "2018-05-28 18:36:35",
                                "updated_at": "2018-06-25 20:20:54",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 29,
                                "matricula": "8919",
                                "name": "RALDA MARCO VINICIO",
                                "email": "marcoviniciofuchsralda@gmail.com",
                                "telefono": "42851931",
                                "nickname": "Vini",
                                "_code": "GUA-838-95u",
                                "created_at": "2018-05-28 18:49:46",
                                "updated_at": "2018-05-28 18:49:46",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 30,
                                "matricula": "12969",
                                "name": "Natalia Mora Vargas",
                                "email": "consultamedicanmv@gmail.com",
                                "telefono": "88219481",
                                "nickname": "NatiMora",
                                "_code": "cor-704-5df",
                                "created_at": "2018-05-28 18:56:08",
                                "updated_at": "2018-05-28 18:56:08",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 31,
                                "matricula": "1300",
                                "name": "Claudia Cobos",
                                "email": "ccobos@medpharma.com.gt",
                                "telefono": "54835554",
                                "nickname": "ccobos",
                                "_code": "GUA-195-XWb",
                                "created_at": "2018-05-28 18:58:57",
                                "updated_at": "2018-05-28 18:58:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 32,
                                "matricula": "2705914268",
                                "name": "Rubén Enrique Tejada Castellon",
                                "email": "retecas01@hotmail.com",
                                "telefono": "89060762",
                                "nickname": "Ninguno",
                                "_code": "HON-710-isf",
                                "created_at": "2018-05-28 19:04:01",
                                "updated_at": "2018-05-28 19:04:01",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 33,
                                "matricula": "4",
                                "name": "Mynor el muerto",
                                "email": "icardon@medpharma.com.gt",
                                "telefono": "1345678",
                                "nickname": "Q",
                                "_code": "HON-774-yOx",
                                "created_at": "2018-05-28 19:04:29",
                                "updated_at": "2018-05-28 19:04:29",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 34,
                                "matricula": "5",
                                "name": "Karen",
                                "email": "icardona@medpharma.com.gt",
                                "telefono": "55555555",
                                "nickname": "T",
                                "_code": "GUA-351-ssS",
                                "created_at": "2018-05-28 19:17:45",
                                "updated_at": "2018-05-28 19:17:45",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 35,
                                "matricula": "8456",
                                "name": "Benavides Murillo Isabel",
                                "email": "draisabelbenavides@hotmail.com",
                                "telefono": "83-36-92-33",
                                "nickname": "Isabel",
                                "_code": "COR-234-r7q",
                                "created_at": "2018-05-28 19:18:17",
                                "updated_at": "2018-05-28 19:18:17",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 36,
                                "matricula": "12630",
                                "name": "VILLEDA RODRIGUEZ ROMILIO JOSE",
                                "email": "rjosuevilledar@gmail.com",
                                "telefono": "42197700",
                                "nickname": "rjosuevilledar",
                                "_code": "GUA-627-79Q",
                                "created_at": "2018-05-28 19:53:04",
                                "updated_at": "2018-07-04 03:27:38",
                                "puntos": 43
                            }
                        },
                        {
                            "user": {
                                "id": 37,
                                "matricula": "16400",
                                "name": "RECINOS GONZALEZ MARIO RENE",
                                "email": "drmariorecinos@gmail.com",
                                "telefono": "4700-3175",
                                "nickname": "DRMR",
                                "_code": "GUA-674-6tB",
                                "created_at": "2018-05-28 20:18:24",
                                "updated_at": "2018-05-28 20:18:24",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 38,
                                "matricula": "8009",
                                "name": "ORTIZ  QUINTANILLA   SILVIA DEL C.",
                                "email": "sdcoq@yahoo.es",
                                "telefono": "502 5703 0443",
                                "nickname": "Silvia Ortiz",
                                "_code": "GUA-542-UZL",
                                "created_at": "2018-05-28 21:10:34",
                                "updated_at": "2018-06-30 08:21:42",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 39,
                                "matricula": "704107872",
                                "name": "Digna Marcela Alvarado Cruz",
                                "email": "dignamarcela@yahoo.com",
                                "telefono": "99698270",
                                "nickname": "Marce",
                                "_code": "HON-832-bNI",
                                "created_at": "2018-05-28 21:13:24",
                                "updated_at": "2018-05-28 21:13:24",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 40,
                                "matricula": "4814",
                                "name": "LOPEZ CASTILLO MARIO RODOLFO",
                                "email": "doctormz6@yahoo.com",
                                "telefono": "55509811",
                                "nickname": "MARITO",
                                "_code": "GUA-189-bkj",
                                "created_at": "2018-05-28 21:32:32",
                                "updated_at": "2018-05-28 21:32:32",
                                "puntos": 119
                            }
                        },
                        {
                            "user": {
                                "id": 41,
                                "matricula": "4748",
                                "name": "Cesar Diaz",
                                "email": "cesardiazhn16@gmail.com",
                                "telefono": "89681325",
                                "nickname": "Cesar Diaz",
                                "_code": "HON-818-Xh9",
                                "created_at": "2018-05-28 21:34:21",
                                "updated_at": "2018-05-28 21:34:21",
                                "puntos": 131
                            }
                        },
                        {
                            "user": {
                                "id": 42,
                                "matricula": "12007",
                                "name": "GARCIA GIRON LUIS ROBERTO ADOLFO GARCIA",
                                "email": "drluisgarcia29@yahoo.com",
                                "telefono": "(502) 3033-5056",
                                "nickname": "Docluismex",
                                "_code": "GUA-798-jwU",
                                "created_at": "2018-05-28 22:42:41",
                                "updated_at": "2018-06-30 01:42:34",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 43,
                                "matricula": "11776",
                                "name": "Jenny Karina Contreras Carranza",
                                "email": "fernandomanzanarez32@gmail.com",
                                "telefono": "97940898",
                                "nickname": "djfercheese22",
                                "_code": "HON-214-98m",
                                "created_at": "2018-05-28 23:16:28",
                                "updated_at": "2018-05-28 23:16:28",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 44,
                                "matricula": "9651",
                                "name": "Diana Herrera Rosales",
                                "email": "dradherrerar@hotmail.com",
                                "telefono": "88147365",
                                "nickname": "Diana",
                                "_code": "COR-926-V0y",
                                "created_at": "2018-05-28 23:28:26",
                                "updated_at": "2018-05-28 23:28:26",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 45,
                                "matricula": "7943",
                                "name": "MARIANELA RODRIGUEZ CHAVARRIA",
                                "email": "marianelarodriguezchavarria@gmail.com",
                                "telefono": "87081845",
                                "nickname": "Nela",
                                "_code": "COR-776-R6i",
                                "created_at": "2018-05-28 23:34:22",
                                "updated_at": "2018-05-28 23:34:22",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 46,
                                "matricula": "9927",
                                "name": "Eduardo",
                                "email": "doczuleta@yahoo.com",
                                "telefono": "71279854",
                                "nickname": "Eduardo",
                                "_code": "SAL-646-o3B",
                                "created_at": "2018-05-28 23:55:09",
                                "updated_at": "2018-05-28 23:55:09",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 47,
                                "matricula": "9723",
                                "name": "HERNANDEZ MONTERROSO JUAN OTONIEL",
                                "email": "drotonielhernandez@hotmail.com",
                                "telefono": "41235624",
                                "nickname": "JOHM",
                                "_code": "GUA-142-GHH",
                                "created_at": "2018-05-29 00:00:52",
                                "updated_at": "2018-05-29 00:00:52",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 48,
                                "matricula": "7188",
                                "name": "BATRES MARTINEZ AURA VIOLETA",
                                "email": "doctorabatres@hotmail.com",
                                "telefono": "50103178",
                                "nickname": "Vio.229",
                                "_code": "GUA-229-zNJ",
                                "created_at": "2018-05-29 00:19:25",
                                "updated_at": "2018-05-29 00:19:25",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 49,
                                "matricula": "8997",
                                "name": "Maria Gabriela Morales Altamirano",
                                "email": "sofigabi4@yahoo.com",
                                "telefono": "41796593",
                                "nickname": "Gabi",
                                "_code": "GUA-083-77H",
                                "created_at": "2018-05-29 00:48:25",
                                "updated_at": "2018-05-29 00:48:25",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 50,
                                "matricula": "15650",
                                "name": "Maria del Rosario Veliz Gonzalez",
                                "email": "chayo2610@yahoo.com.mx",
                                "telefono": "42208450",
                                "nickname": "chayo",
                                "_code": "GUA-488-O2C",
                                "created_at": "2018-05-29 01:49:00",
                                "updated_at": "2018-06-30 04:15:17",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 51,
                                "matricula": "1",
                                "name": "Luisa Fernanda Villatoro de Duarte",
                                "email": "letonam@gmail.com",
                                "telefono": "24372207",
                                "nickname": "Wicha",
                                "_code": "GUA-591-DbQ",
                                "created_at": "2018-05-29 02:19:02",
                                "updated_at": "2018-05-29 02:19:02",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 52,
                                "matricula": "4051",
                                "name": "RODRÍGUEZ CASTANEDA JOSÉ ALEJANDRO",
                                "email": "alejandrorod179@gmail.com",
                                "telefono": "50379897771",
                                "nickname": "Alejandro rodriguez",
                                "_code": "SAL-412-9Fa",
                                "created_at": "2018-05-29 02:23:26",
                                "updated_at": "2018-05-29 02:23:26",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 53,
                                "matricula": "12833",
                                "name": "Sanndy Perez Velasquez",
                                "email": "gmendza@gmail.com",
                                "telefono": "53580875",
                                "nickname": "Carmelita",
                                "_code": "GUA-612-wEX",
                                "created_at": "2018-05-29 02:51:34",
                                "updated_at": "2018-05-29 02:51:34",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 54,
                                "matricula": "1499",
                                "name": "Carlos Felipe Ponce Orellana",
                                "email": "cponce_xs@hotmail.com",
                                "telefono": "47456789",
                                "nickname": "CF Ponce",
                                "_code": "GUA-425-ld4",
                                "created_at": "2018-05-29 02:55:25",
                                "updated_at": "2018-05-29 02:55:25",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 55,
                                "matricula": "14588",
                                "name": "CUESTA  CRUZ  YUDISH",
                                "email": "ycuesta1006@gmail.com",
                                "telefono": "5412 2565",
                                "nickname": "ycuesta1006@gmail.com",
                                "_code": "GUA-498-CnU",
                                "created_at": "2018-05-29 03:02:30",
                                "updated_at": "2018-05-29 03:02:30",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 56,
                                "matricula": "2517",
                                "name": "CHINCHILLA NELSON",
                                "email": "nchinchillacalix@gmail.com",
                                "telefono": "96199866",
                                "nickname": "NCC",
                                "_code": "HON-056-Bru",
                                "created_at": "2018-05-29 03:15:14",
                                "updated_at": "2018-06-14 07:30:49",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 57,
                                "matricula": "10138",
                                "name": "PALMA MONTES JOSÉ DANIEL",
                                "email": "josedanielpalma@hotmail.com",
                                "telefono": "74658733",
                                "nickname": "Daniel",
                                "_code": "SAL-220-nUQ",
                                "created_at": "2018-05-29 03:19:53",
                                "updated_at": "2018-05-29 03:19:53",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 58,
                                "matricula": "9589",
                                "name": "ARELLANO ALVAREZ KLELIA MERCEDES",
                                "email": "klelia.arellano@yahoo.com",
                                "telefono": "53061539",
                                "nickname": "Kle",
                                "_code": "GUA-748-NJ8",
                                "created_at": "2018-05-29 03:34:16",
                                "updated_at": "2018-05-29 03:34:16",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 59,
                                "matricula": "21611335",
                                "name": "Sánchez Núñez Santiago José",
                                "email": "santiagoj_sn@hotmail.com",
                                "telefono": "31551675",
                                "nickname": "Santi504",
                                "_code": "HON-967-Be1",
                                "created_at": "2018-05-29 03:47:11",
                                "updated_at": "2018-05-29 03:47:11",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 60,
                                "matricula": "801201",
                                "name": "Norma Alicia Nuñez Linares",
                                "email": "nalicia53@yahoo.com",
                                "telefono": "95431099",
                                "nickname": "Moma504",
                                "_code": "HON-047-ecu",
                                "created_at": "2018-05-29 04:56:34",
                                "updated_at": "2018-05-29 04:56:34",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 61,
                                "matricula": "44514",
                                "name": "Luis Carlos Aráuz  Guzmán",
                                "email": "dexterluis16@hotmail.com",
                                "telefono": "58199264",
                                "nickname": "Lcag16",
                                "_code": "Nic-834-sli",
                                "created_at": "2018-05-29 05:39:04",
                                "updated_at": "2018-05-29 05:39:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 62,
                                "matricula": "11043",
                                "name": "DE FLORAN MOSCOSO AMANDA TATIANA",
                                "email": "dra.defloran@gmail.com",
                                "telefono": "59757375",
                                "nickname": "Tatis",
                                "_code": "gua-602-fev",
                                "created_at": "2018-05-29 05:49:21",
                                "updated_at": "2018-05-29 05:49:21",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 63,
                                "matricula": "15248",
                                "name": "oscar",
                                "email": "oscaralexander02@hotmail.com",
                                "telefono": "72920982",
                                "nickname": "umaña",
                                "_code": "SAL-803-sEX",
                                "created_at": "2018-05-29 06:38:57",
                                "updated_at": "2018-05-29 06:38:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 64,
                                "matricula": "5248",
                                "name": "OLESINSKI BARILLAS DE HERNANDEZ BARBARA ZUCEL",
                                "email": "bolehe@gmail.com",
                                "telefono": "45725929",
                                "nickname": "Barbara",
                                "_code": "GUA-221-9VP",
                                "created_at": "2018-05-29 06:44:13",
                                "updated_at": "2018-05-29 06:44:13",
                                "puntos": 68
                            }
                        },
                        {
                            "user": {
                                "id": 65,
                                "matricula": "7062",
                                "name": "OSTORGA GARCIA JUAN FRANCISCO",
                                "email": "ostorga122@gmail.com",
                                "telefono": "40298714",
                                "nickname": "JuanOstorga",
                                "_code": "GUA-957-E9N",
                                "created_at": "2018-05-29 07:07:18",
                                "updated_at": "2018-05-29 07:07:18",
                                "puntos": 65
                            }
                        },
                        {
                            "user": {
                                "id": 66,
                                "matricula": "15720",
                                "name": "ARGUETA NOLASCO LILIAN DOLORES",
                                "email": "draargueta8@outlook.es",
                                "telefono": "72134545",
                                "nickname": "Dra.Argueta",
                                "_code": "SAL-270-f36",
                                "created_at": "2018-05-29 07:09:26",
                                "updated_at": "2018-05-29 07:09:26",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 67,
                                "matricula": "9383",
                                "name": "ESPAÑA NAJERA HENRY AMADO",
                                "email": "henry.najera@hotmail.com",
                                "telefono": "55097821",
                                "nickname": "henryespaña",
                                "_code": "GUA-956-xaA",
                                "created_at": "2018-05-29 07:12:06",
                                "updated_at": "2018-06-16 08:29:39",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 68,
                                "matricula": "6792",
                                "name": "GALINDO OLIVEROS NELSON EZEQUIEL",
                                "email": "drnego@hotmail.com",
                                "telefono": "56620431",
                                "nickname": "Nelson",
                                "_code": "GUA-152-4yP",
                                "created_at": "2018-05-29 07:12:47",
                                "updated_at": "2018-06-13 08:08:09",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 69,
                                "matricula": "4653",
                                "name": "Bernarda Liliana Cáceres Canales",
                                "email": "lilyadf70@gmail.com",
                                "telefono": "504 32036056",
                                "nickname": "Dran Cáceres",
                                "_code": "HON-949-1qf",
                                "created_at": "2018-05-29 07:13:06",
                                "updated_at": "2018-05-29 07:13:06",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 70,
                                "matricula": "0",
                                "name": "Miguel Fernando Quisquiná Herrera",
                                "email": "miguiguate12@gmail.com",
                                "telefono": "4962-6262 y 5226-9307",
                                "nickname": "MFQH",
                                "_code": "GUA-841-DWm",
                                "created_at": "2018-05-29 07:16:03",
                                "updated_at": "2018-05-29 07:16:03",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 71,
                                "matricula": "5170",
                                "name": "LOPEZ URCINA SALVADOR",
                                "email": "unimedic15@gmail.com",
                                "telefono": "99114922",
                                "nickname": "TITO",
                                "_code": "HON-260-yE1",
                                "created_at": "2018-05-29 07:17:21",
                                "updated_at": "2018-06-15 19:45:46",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 72,
                                "matricula": "13673",
                                "name": "OCHAETA PALMA JOSE MANUEL",
                                "email": "palmocho8@hotmail.com",
                                "telefono": "41237081",
                                "nickname": "Ocho",
                                "_code": "GUA-614-jl8",
                                "created_at": "2018-05-29 07:31:55",
                                "updated_at": "2018-05-29 07:31:55",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 73,
                                "matricula": "10496",
                                "name": "PEREZ MARTINEZ JOSUE EDUARDO",
                                "email": "doctorjosueperez@gmail.com",
                                "telefono": "56874059",
                                "nickname": "Guategool",
                                "_code": "GUA-607-tGE",
                                "created_at": "2018-05-29 08:22:51",
                                "updated_at": "2018-05-29 08:22:51",
                                "puntos": 116
                            }
                        },
                        {
                            "user": {
                                "id": 74,
                                "matricula": "15509",
                                "name": "MEJIA CERON GUSTAVO ANTONIO",
                                "email": "gustonio88@yahoo.com",
                                "telefono": "76525434",
                                "nickname": "gustonio88",
                                "_code": "SAL-655-kd7",
                                "created_at": "2018-05-29 08:48:44",
                                "updated_at": "2018-05-29 08:48:44",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 75,
                                "matricula": "6523",
                                "name": "MARROQUIN HERNANDEZ JOSE EDGARDO",
                                "email": "jem8567@gmail.com",
                                "telefono": "78445831",
                                "nickname": "ALESIO",
                                "_code": "SAL-057-umX",
                                "created_at": "2018-05-29 09:53:40",
                                "updated_at": "2018-05-29 09:53:40",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 76,
                                "matricula": "16049",
                                "name": "BARRERA GODOY LUDVIN GEOVANY",
                                "email": "ludvingeo@yahoo.es",
                                "telefono": "55862131",
                                "nickname": "LUDVINGEO",
                                "_code": "GUA-080-rFP",
                                "created_at": "2018-05-29 18:54:37",
                                "updated_at": "2018-05-29 18:54:37",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 77,
                                "matricula": "2471",
                                "name": "NO NAME - NEW USER",
                                "email": "dayannamejia@hotmail.es",
                                "telefono": "44201748",
                                "nickname": "Dayan",
                                "_code": "GUA-293-ld1",
                                "created_at": "2018-05-29 18:57:54",
                                "updated_at": "2018-05-29 18:57:54",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 78,
                                "matricula": "5482",
                                "name": "Danys Fallas",
                                "email": "danysfallas@gmail.com",
                                "telefono": "506-83318030",
                                "nickname": "Danys",
                                "_code": "COR-911-rWO",
                                "created_at": "2018-05-29 19:11:58",
                                "updated_at": "2018-05-29 19:11:58",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 79,
                                "matricula": "18380",
                                "name": "ORTIZ CHACON CRISTIAN YOBANY",
                                "email": "cristianyobao22@gmail.com",
                                "telefono": "41858199",
                                "nickname": "Cris",
                                "_code": "GUA-889-Mb1",
                                "created_at": "2018-05-29 19:26:52",
                                "updated_at": "2018-05-29 19:26:52",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 80,
                                "matricula": "11283",
                                "name": "PINEDA LAINEZ IRSY VICTORINA",
                                "email": "vencejosvictoria@gmail.com",
                                "telefono": "50496346842",
                                "nickname": "Victorina",
                                "_code": "HON-057-hfb",
                                "created_at": "2018-05-29 19:37:57",
                                "updated_at": "2018-05-29 19:37:57",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 81,
                                "matricula": "1931",
                                "name": "MARTINEZ HORACIO",
                                "email": "hmartinezs@hotmail.com",
                                "telefono": "99918033",
                                "nickname": "hamas",
                                "_code": "HON-150-vx2",
                                "created_at": "2018-05-29 19:58:13",
                                "updated_at": "2018-05-29 19:58:13",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 82,
                                "matricula": "2540",
                                "name": "GOMEZ AZURDIA JORGE HUMBERTO",
                                "email": "jhgomez52@hotmail.com",
                                "telefono": "53144811",
                                "nickname": "Jorge Gomez Azurdia",
                                "_code": "GUA-045-gpr",
                                "created_at": "2018-05-29 20:16:41",
                                "updated_at": "2018-05-29 20:16:41",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 83,
                                "matricula": "7282",
                                "name": "AGUILAR UMAÑA FRANCISCO",
                                "email": "faumegamedica@gmail.com",
                                "telefono": "54049549",
                                "nickname": "Fau",
                                "_code": "GUA-879-NKF",
                                "created_at": "2018-05-29 20:20:34",
                                "updated_at": "2018-05-29 20:20:34",
                                "puntos": 122
                            }
                        },
                        {
                            "user": {
                                "id": 84,
                                "matricula": "7755",
                                "name": "ORDOÑEZ GODOY FREDY OMAR",
                                "email": "fredyomarordonezgodoy@gmail.com",
                                "telefono": "32113493",
                                "nickname": "ordoñez",
                                "_code": "HON-143-DEb",
                                "created_at": "2018-05-29 20:25:28",
                                "updated_at": "2018-05-29 20:25:28",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 85,
                                "matricula": "7570",
                                "name": "LAURA CORDERO VARGAS",
                                "email": "laucorderov@gmail.com",
                                "telefono": "88483729",
                                "nickname": "LAUCORDEROV",
                                "_code": "COR-190-RI2",
                                "created_at": "2018-05-29 20:26:37",
                                "updated_at": "2018-05-29 20:26:37",
                                "puntos": 65
                            }
                        },
                        {
                            "user": {
                                "id": 86,
                                "matricula": "3976",
                                "name": "ESPINOZA MONTES RODOLFO FRANCISCO",
                                "email": "respinozamd@gmail.com",
                                "telefono": "52034085",
                                "nickname": "Chofo",
                                "_code": "GUA-346-LPP",
                                "created_at": "2018-05-29 21:09:26",
                                "updated_at": "2018-06-29 03:25:48",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 87,
                                "matricula": "8555",
                                "name": "ANLEU ALONZO GUSTAVO ADOLFO",
                                "email": "drgaaa@hotmail.com",
                                "telefono": "5204-2006",
                                "nickname": "Gustavo",
                                "_code": "GUA-716-v6V",
                                "created_at": "2018-05-29 21:13:36",
                                "updated_at": "2018-05-29 21:13:36",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 88,
                                "matricula": "13280",
                                "name": "ALCANTAR GIOVANI OSCAR",
                                "email": "dr.alcantarmerino@hotmail.com",
                                "telefono": "79244824",
                                "nickname": "DOCTOR",
                                "_code": "SAL-102-uaQ",
                                "created_at": "2018-05-29 21:46:58",
                                "updated_at": "2018-05-29 22:06:35",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 89,
                                "matricula": "9948",
                                "name": "VASQUEZ MATUTE JAIRO ALEXANDER",
                                "email": "jairox68@yahoo.es",
                                "telefono": "+50432593155",
                                "nickname": "Jairo Vasquez",
                                "_code": "HON-840-mvK",
                                "created_at": "2018-05-29 22:00:03",
                                "updated_at": "2018-05-29 22:00:03",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 90,
                                "matricula": "9454",
                                "name": "HERNANDEZ FABIAN, BYRON ESTUARDO",
                                "email": "byronha2211@gmail.com",
                                "telefono": "59141617",
                                "nickname": "Byron2803",
                                "_code": "GUA-307-n8A",
                                "created_at": "2018-05-29 22:00:30",
                                "updated_at": "2018-05-29 22:00:30",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 91,
                                "matricula": "10980",
                                "name": "ESPAÑA RODRIGUEZ HECTOR DAVID",
                                "email": "espanar73@hotmail.com",
                                "telefono": "42185791",
                                "nickname": "Teto",
                                "_code": "Gua-084-LyM",
                                "created_at": "2018-05-29 22:12:15",
                                "updated_at": "2018-05-29 22:12:15",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 92,
                                "matricula": "4288",
                                "name": "FRANCISCO GUILLERMO DUNNING MENDOZA",
                                "email": "dunning1968@yahoo.es",
                                "telefono": "98640584",
                                "nickname": "FRANKDUXX",
                                "_code": "HON-076-YEt",
                                "created_at": "2018-05-29 22:39:50",
                                "updated_at": "2018-05-29 22:39:50",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 93,
                                "matricula": "7936",
                                "name": "ROMERO DE MOLINA CLAUDIA CARLOTA",
                                "email": "paolo3018@gmail.com",
                                "telefono": "26702147",
                                "nickname": "Claudia_Romero",
                                "_code": "SAL-523-zG4",
                                "created_at": "2018-05-29 23:46:07",
                                "updated_at": "2018-05-29 23:46:07",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 94,
                                "matricula": "15620",
                                "name": "Sandra G. Sanchinelli López",
                                "email": "sgsanchinelli@gmail.com",
                                "telefono": "53339511",
                                "nickname": "JASL",
                                "_code": "Gua-285-b3O",
                                "created_at": "2018-05-30 00:19:11",
                                "updated_at": "2018-05-30 00:19:11",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 95,
                                "matricula": "25523",
                                "name": "ENGELS FRANCISCO ORTEGA RIVAS",
                                "email": "engelsortegarivas@gmail.com",
                                "telefono": "85772865",
                                "nickname": "engelsortegarivas@gmail.com",
                                "_code": "NIC-058-9TE",
                                "created_at": "2018-05-30 00:31:52",
                                "updated_at": "2018-05-30 00:31:52",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 96,
                                "matricula": "15384",
                                "name": "SALOMON GUADALUPE VERONICA",
                                "email": "salomon1225@hotmail.com",
                                "telefono": "70864021",
                                "nickname": "Salo",
                                "_code": "SAL-668-3AU",
                                "created_at": "2018-05-30 00:36:14",
                                "updated_at": "2018-05-30 00:36:14",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 97,
                                "matricula": "10862",
                                "name": "Sendy Rojas Arias",
                                "email": "dra.rojasarias@gmail.com",
                                "telefono": "85681457",
                                "nickname": "DraRoj",
                                "_code": "COR-780-f3d",
                                "created_at": "2018-05-30 01:23:43",
                                "updated_at": "2018-05-30 01:23:43",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 98,
                                "matricula": "13002",
                                "name": "Rolando Leonel Molina Hernandez",
                                "email": "moli5500@hotmail.com",
                                "telefono": "33028685",
                                "nickname": "moli5500",
                                "_code": "HON-813-A2U",
                                "created_at": "2018-05-30 01:45:50",
                                "updated_at": "2018-05-30 01:45:50",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 99,
                                "matricula": "0",
                                "name": "Wagner Lorenzo",
                                "email": "gprogsa@gmail.com",
                                "telefono": "59790441",
                                "nickname": "Wagner",
                                "_code": "GUA-910-MEY",
                                "created_at": "2018-05-30 02:20:35",
                                "updated_at": "2018-05-30 02:20:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 100,
                                "matricula": "12129",
                                "name": "Josue Cordero Solano",
                                "email": "joscorso@gmail.com",
                                "telefono": "86105736",
                                "nickname": "Josh",
                                "_code": "COR-707-M08",
                                "created_at": "2018-05-30 02:54:47",
                                "updated_at": "2018-07-05 02:49:37",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 101,
                                "matricula": "8078",
                                "name": "ALVAREZ DE CENTENO XIOMARA",
                                "email": "xpazmejia@hotmail.com",
                                "telefono": "74360200",
                                "nickname": "Xiomara",
                                "_code": "SAL-404-1ym",
                                "created_at": "2018-05-30 03:41:34",
                                "updated_at": "2018-06-14 05:47:18",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 102,
                                "matricula": "17363",
                                "name": "MORALES GUTIERREZ ERICK EDUARDO",
                                "email": "ericedumg99@gmail.com",
                                "telefono": "55172499",
                                "nickname": "EricMorales",
                                "_code": "GUA-574-JN5",
                                "created_at": "2018-05-30 03:51:19",
                                "updated_at": "2018-05-30 03:51:19",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 103,
                                "matricula": "17450",
                                "name": "Karen Ninett Castañeda Canjura",
                                "email": "drakanjura@hotmail.com",
                                "telefono": "50167498",
                                "nickname": "Karen",
                                "_code": "GUa-700-T0G",
                                "created_at": "2018-05-30 03:52:39",
                                "updated_at": "2018-05-30 03:52:39",
                                "puntos": 13
                            }
                        },
                        {
                            "user": {
                                "id": 104,
                                "matricula": "12427",
                                "name": "FIGUEROA DOMINGUEZ HERMINIA",
                                "email": "doctorajuguete4@gmail.com",
                                "telefono": "76652329",
                                "nickname": "Her",
                                "_code": "Sal-983-5Bc",
                                "created_at": "2018-05-30 03:56:54",
                                "updated_at": "2018-05-30 03:56:54",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 105,
                                "matricula": "6862",
                                "name": "FRANCIA ORELLANA DINORA CECILIA",
                                "email": "franciamd@gmail.com",
                                "telefono": "77182714",
                                "nickname": "Dinora",
                                "_code": "SAL-502-mvY",
                                "created_at": "2018-05-30 04:43:47",
                                "updated_at": "2018-05-30 04:43:47",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 106,
                                "matricula": "16125",
                                "name": "Karla Najera Romero",
                                "email": "karlanrdoc@hotmail.com",
                                "telefono": "55251744",
                                "nickname": "KARDOC",
                                "_code": "GUA-409-VxF",
                                "created_at": "2018-05-30 05:12:04",
                                "updated_at": "2018-05-30 05:17:48",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 107,
                                "matricula": "10375",
                                "name": "maricela jackeline lopez hernandez",
                                "email": "margie_gabriela15@yahoo.com",
                                "telefono": "98761040",
                                "nickname": "mlopez",
                                "_code": "HON-665-y9k",
                                "created_at": "2018-05-30 05:45:15",
                                "updated_at": "2018-05-30 05:45:15",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 108,
                                "matricula": "9945",
                                "name": "SAN MARTIN HERNADEZ MARDOLL MADELAINE",
                                "email": "mardoll.s86@yahoo.com",
                                "telefono": "95830911",
                                "nickname": "Melodia",
                                "_code": "HON-257-BsV",
                                "created_at": "2018-05-30 06:08:59",
                                "updated_at": "2018-05-30 06:08:59",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 109,
                                "matricula": "3014",
                                "name": "JORDAN PORTILLO CARLOS HUMBERTO",
                                "email": "elsarecinosbillot@yahoo.com",
                                "telefono": "52119018",
                                "nickname": "Carlos",
                                "_code": "GUA-987-0Jh",
                                "created_at": "2018-05-30 06:18:46",
                                "updated_at": "2018-05-30 06:18:46",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 110,
                                "matricula": "7538",
                                "name": "Fernando Emilio Funez Castillo",
                                "email": "ffherr515@yahoo.es",
                                "telefono": "99262127",
                                "nickname": "Fher",
                                "_code": "HON-810-CDn",
                                "created_at": "2018-05-30 06:46:13",
                                "updated_at": "2018-05-30 06:46:13",
                                "puntos": 28
                            }
                        },
                        {
                            "user": {
                                "id": 111,
                                "matricula": "1405",
                                "name": "RICO CLAROS JULIO ALBERTO",
                                "email": "juliorico21@yahoo.com",
                                "telefono": "(504)9990-9946",
                                "nickname": "Ricky",
                                "_code": "HON-842-un6",
                                "created_at": "2018-05-30 06:48:03",
                                "updated_at": "2018-05-30 06:48:03",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 112,
                                "matricula": "4657",
                                "name": "BETANCOURTH M. ILSE YAMILETH",
                                "email": "ilsebetancourth@yahoo.com",
                                "telefono": "33338622",
                                "nickname": "Ilse Betancourth",
                                "_code": "HON-570-H4D",
                                "created_at": "2018-05-30 06:52:29",
                                "updated_at": "2018-05-30 06:52:29",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 113,
                                "matricula": "6471",
                                "name": "LOPEZ MARTINEZ AMILCAR",
                                "email": "lopezamilcar291@gmail.com",
                                "telefono": "50175171",
                                "nickname": "Amilcar",
                                "_code": "GUA-224-dlS",
                                "created_at": "2018-05-30 07:02:16",
                                "updated_at": "2018-05-30 07:02:16",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 114,
                                "matricula": "2605",
                                "name": "Solano Fernandez Jose Rafael",
                                "email": "solcas@ice.co.cr",
                                "telefono": "506-22534529",
                                "nickname": "solcas",
                                "_code": "COR-455-QBr",
                                "created_at": "2018-05-30 07:14:03",
                                "updated_at": "2018-05-30 07:14:03",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 115,
                                "matricula": "12155",
                                "name": "JUAN FERNANDO VASQUEZ LOPEZ",
                                "email": "jfernandovasquez@hotmail.com",
                                "telefono": "50504547",
                                "nickname": "Fer",
                                "_code": "Gua-412-4Ru",
                                "created_at": "2018-05-30 07:25:00",
                                "updated_at": "2018-07-05 07:51:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 116,
                                "matricula": "7213",
                                "name": "AYALA LEÓN, ANA LUCRECIA",
                                "email": "analu.ayala@hotmail.com",
                                "telefono": "43947682",
                                "nickname": "LUCKY",
                                "_code": "GUA-355-AQP",
                                "created_at": "2018-05-30 08:09:02",
                                "updated_at": "2018-05-30 08:09:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 117,
                                "matricula": "4420",
                                "name": "VARELA LUPIAC DARIO ERNEST",
                                "email": "danielvarelaf@yahoo.com",
                                "telefono": "94980502",
                                "nickname": "Vare",
                                "_code": "HON-676-WM4",
                                "created_at": "2018-05-30 08:15:51",
                                "updated_at": "2018-05-30 08:15:51",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 118,
                                "matricula": "9364",
                                "name": "HERRERA HERBET FRANCISCO",
                                "email": "hfranciscohr@gmail.com",
                                "telefono": "75019395",
                                "nickname": "herbert",
                                "_code": "SAL-942-ozA",
                                "created_at": "2018-05-30 08:58:00",
                                "updated_at": "2018-05-30 08:58:00",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 119,
                                "matricula": "3342018",
                                "name": "Fernando Miguel Lopez Marroquin",
                                "email": "fmlm01@outlook.com",
                                "telefono": "70318681",
                                "nickname": "fmlm",
                                "_code": "SAL-923-NnV",
                                "created_at": "2018-05-30 09:08:09",
                                "updated_at": "2018-05-30 09:08:09",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 120,
                                "matricula": "5648",
                                "name": "HERNANDEZ MERLI SULEMA",
                                "email": "merlyzulema@yahoo.com",
                                "telefono": "99293873",
                                "nickname": "Danleo",
                                "_code": "HON-221-01C",
                                "created_at": "2018-05-30 15:33:28",
                                "updated_at": "2018-05-30 15:35:47",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 121,
                                "matricula": "4238",
                                "name": "Maria Elena Acosta Alvarenga",
                                "email": "susethacosta06@gmail.com",
                                "telefono": "89641262",
                                "nickname": "Maria Elena",
                                "_code": "HON-791-8MQ",
                                "created_at": "2018-05-30 17:01:00",
                                "updated_at": "2018-05-30 17:01:00",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 122,
                                "matricula": "9699",
                                "name": "Carol Lanza",
                                "email": "lanzadiazgabriela@gmail.com",
                                "telefono": "99838985",
                                "nickname": "Gaby",
                                "_code": "HON-628-8DW",
                                "created_at": "2018-05-30 17:44:33",
                                "updated_at": "2018-05-30 17:44:33",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 123,
                                "matricula": "28931",
                                "name": "Agueda Georgina Hernandez Barberia",
                                "email": "angelarturo.150480@gmail.com",
                                "telefono": "58748258",
                                "nickname": "aguedahernandez",
                                "_code": "GUA-459-Eii",
                                "created_at": "2018-05-30 17:58:15",
                                "updated_at": "2018-05-30 17:58:15",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 124,
                                "matricula": "3",
                                "name": "Estuardo Letona",
                                "email": "letona@outlook.com",
                                "telefono": "42143542",
                                "nickname": "ML",
                                "_code": "GUA-681-jQz",
                                "created_at": "2018-05-30 18:06:38",
                                "updated_at": "2018-07-04 23:41:10",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 125,
                                "matricula": "3671",
                                "name": "LOPEZ RECINOS ROMEO EFRAIN",
                                "email": "dr.romeoefra@yahoo.com.mx",
                                "telefono": "52086961",
                                "nickname": "Romeo López",
                                "_code": "GUA-059-5Gq",
                                "created_at": "2018-05-30 18:56:28",
                                "updated_at": "2018-05-30 18:56:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 126,
                                "matricula": "3307",
                                "name": "LECHUGA DEL CID ROBERTO DANILO",
                                "email": "lechuga7f@gmail.com",
                                "telefono": "54943826",
                                "nickname": "Lechuga",
                                "_code": "GUA-343-HF7",
                                "created_at": "2018-05-30 19:23:46",
                                "updated_at": "2018-05-30 19:23:46",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 127,
                                "matricula": "9979",
                                "name": "SARAVIA HENRIQUEZ KARLA CAROLINA",
                                "email": "neumoped@hotmaiil.com",
                                "telefono": "503-71395576",
                                "nickname": "Ksaravia",
                                "_code": "SAL-523-nwp",
                                "created_at": "2018-05-30 19:32:42",
                                "updated_at": "2018-05-30 19:32:42",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 128,
                                "matricula": "5525",
                                "name": "Edwin Winter",
                                "email": "edwinenero2011@hotmail.com",
                                "telefono": "(502) 55522975",
                                "nickname": "Chambre",
                                "_code": "GUA-275-pku",
                                "created_at": "2018-05-30 19:47:21",
                                "updated_at": "2018-05-30 19:47:21",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 129,
                                "matricula": "15192",
                                "name": "SAUCEDO BARAHONA CECILIA XIOMARA",
                                "email": "cecisau21@yahoo.com",
                                "telefono": "40494053",
                                "nickname": "Ceci",
                                "_code": "GUA-552-c1S",
                                "created_at": "2018-05-30 20:21:03",
                                "updated_at": "2018-06-13 22:26:58",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 130,
                                "matricula": "2102",
                                "name": "Edgar Vargas Alfaro",
                                "email": "vargasalfaroedgar@gmail.com",
                                "telefono": "88423537",
                                "nickname": "Edgar Vargas",
                                "_code": "COR-542-KEO",
                                "created_at": "2018-05-30 20:48:51",
                                "updated_at": "2018-05-30 20:48:51",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 131,
                                "matricula": "11597",
                                "name": "Guillen Navarro Diana Elena",
                                "email": "dguinav@hotmail.com",
                                "telefono": "99054177",
                                "nickname": "Elenita",
                                "_code": "HON-076-wIR",
                                "created_at": "2018-05-30 20:50:24",
                                "updated_at": "2018-07-10 02:34:09",
                                "puntos": 29
                            }
                        },
                        {
                            "user": {
                                "id": 132,
                                "matricula": "2502",
                                "name": "QUIJIVIX   TOHON  CARLOS  FRANCISCO",
                                "email": "cquijivix@gmail.com",
                                "telefono": "502 55290429",
                                "nickname": "Paco76",
                                "_code": "GUA-721-9It",
                                "created_at": "2018-05-30 21:43:25",
                                "updated_at": "2018-05-30 21:43:25",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 133,
                                "matricula": "790",
                                "name": "Brenes Rojas Rafael",
                                "email": "papibre@gmail.com",
                                "telefono": "+506 83429689",
                                "nickname": "Rafa",
                                "_code": "COR-780-a6s",
                                "created_at": "2018-05-30 21:47:33",
                                "updated_at": "2018-05-30 21:47:33",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 134,
                                "matricula": "12620",
                                "name": "FUENTES  RUBIO  GERARDO    A.",
                                "email": "doctorfuentesrubio@gmail.com",
                                "telefono": "40033066",
                                "nickname": "Ger",
                                "_code": "GUA-108-HiE",
                                "created_at": "2018-05-30 22:31:14",
                                "updated_at": "2018-05-30 22:31:14",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 135,
                                "matricula": "11576",
                                "name": "GUEVARA RAYMUNDO ALVARO RENE",
                                "email": "arguevarar@yahoo.com.mx",
                                "telefono": "78327019",
                                "nickname": "alvaro guevara",
                                "_code": "GUA-396-hzk",
                                "created_at": "2018-05-30 22:40:55",
                                "updated_at": "2018-06-14 21:22:18",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 136,
                                "matricula": "15923",
                                "name": "MIGUEL ERNESTO PÉREZ PANEQUE",
                                "email": "paneque1977@yahoo.com",
                                "telefono": "59661170",
                                "nickname": "Paneque",
                                "_code": "GUA-204-lPm",
                                "created_at": "2018-05-30 23:00:00",
                                "updated_at": "2018-05-30 23:00:00",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 137,
                                "matricula": "11328",
                                "name": "RAMIREZ RAMOS GERSON GEOVANY",
                                "email": "gersonpedia@hotmail.com",
                                "telefono": "51293875",
                                "nickname": "Gersonpedia",
                                "_code": "GUA-741-UcF",
                                "created_at": "2018-05-30 23:52:43",
                                "updated_at": "2018-05-30 23:52:43",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 138,
                                "matricula": "7590",
                                "name": "GRANADOS FIGUEROA CINTHYA L.",
                                "email": "cingrafi@hotmail.com",
                                "telefono": "87128445",
                                "nickname": "Cinthya",
                                "_code": "COR-119-6uZ",
                                "created_at": "2018-05-31 00:16:29",
                                "updated_at": "2018-05-31 00:16:29",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 139,
                                "matricula": "5224",
                                "name": "ALVARADO CARIAS JAIME ADOLFO",
                                "email": "jaimealvarado3@hotmail.es",
                                "telefono": "57431038",
                                "nickname": "Jaime",
                                "_code": "GUA-748-7L3",
                                "created_at": "2018-05-31 00:19:45",
                                "updated_at": "2018-05-31 00:19:45",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 140,
                                "matricula": "5513",
                                "name": "ZETINO MIGUEL PATRICIO",
                                "email": "dr.patriciozetino@gmail.com",
                                "telefono": "78377518",
                                "nickname": "Dr.patriciozetino",
                                "_code": "SAL-931-GCp",
                                "created_at": "2018-05-31 00:21:28",
                                "updated_at": "2018-05-31 00:21:28",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 141,
                                "matricula": "15468",
                                "name": "ECHEVERRIA ESPINOZA NANCY ELENA",
                                "email": "helen_9498@hotmail.com",
                                "telefono": "56917976",
                                "nickname": "Helen9498",
                                "_code": "GUA-295-Mwm",
                                "created_at": "2018-05-31 01:19:48",
                                "updated_at": "2018-05-31 01:19:48",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 142,
                                "matricula": "8489",
                                "name": "Maria Cecilia",
                                "email": "dra_madrigal@yahoo.com",
                                "telefono": "88476568",
                                "nickname": "Ceci",
                                "_code": "COR-344-HOC",
                                "created_at": "2018-05-31 01:47:57",
                                "updated_at": "2018-05-31 01:47:57",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 143,
                                "matricula": "18062",
                                "name": "XICARA BARRIOS RODRIGO FELIX DAVID",
                                "email": "xicarabarrios@gmail.com",
                                "telefono": "52071319",
                                "nickname": "rodrigo xicara",
                                "_code": "GUA-678-EPX",
                                "created_at": "2018-05-31 01:51:49",
                                "updated_at": "2018-05-31 01:51:49",
                                "puntos": 65
                            }
                        },
                        {
                            "user": {
                                "id": 144,
                                "matricula": "7774",
                                "name": "LOPEZ PAYES JOSE FERNANDO",
                                "email": "fernandolopezpayes@gmail.comn",
                                "telefono": "53186385",
                                "nickname": "NandoL",
                                "_code": "GUA-535-klL",
                                "created_at": "2018-05-31 01:53:18",
                                "updated_at": "2018-05-31 01:53:18",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 145,
                                "matricula": "8569",
                                "name": "LOPEZ RECINOS ELMER GUILLERMO",
                                "email": "gille.pglg70@gmail.com",
                                "telefono": "58925930",
                                "nickname": "DR. Lopez",
                                "_code": "GUA-258-Uax",
                                "created_at": "2018-05-31 02:08:14",
                                "updated_at": "2018-05-31 02:08:14",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 146,
                                "matricula": "13945",
                                "name": "Jeniffer Vanessa Echeverria Espinoza",
                                "email": "dra_jennyecheverria@hotmail.com",
                                "telefono": "42111125",
                                "nickname": "Jenny",
                                "_code": "GUA-809-0cv",
                                "created_at": "2018-05-31 02:09:33",
                                "updated_at": "2018-05-31 02:09:33",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 147,
                                "matricula": "6634",
                                "name": "Aston Ronaldo Martin Mortley",
                                "email": "astonmartin@gmail.com",
                                "telefono": "66361273",
                                "nickname": "negro",
                                "_code": "GUA-735-k4k",
                                "created_at": "2018-05-31 02:17:17",
                                "updated_at": "2018-05-31 02:17:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 148,
                                "matricula": "2158",
                                "name": "Deliyore Romero Jorge Enrique",
                                "email": "deliyore@gmail.com",
                                "telefono": "88219755",
                                "nickname": "doc",
                                "_code": "COR-965-hZk",
                                "created_at": "2018-05-31 02:29:30",
                                "updated_at": "2018-05-31 02:29:30",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 149,
                                "matricula": "13839",
                                "name": "CASTRO AGREDA WILSON ALEXANDER",
                                "email": "wilsoncastro002@mail.com",
                                "telefono": "6107-3875",
                                "nickname": "will",
                                "_code": "SAL-386-U2W",
                                "created_at": "2018-05-31 02:43:51",
                                "updated_at": "2018-05-31 02:43:51",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 150,
                                "matricula": "7820",
                                "name": "CARLOS ESTUARDO LEMUS PEREZ",
                                "email": "multipedia2002@yahoo.es",
                                "telefono": "55067448",
                                "nickname": "ESTUARDO",
                                "_code": "GUA-985-q9U",
                                "created_at": "2018-05-31 03:00:14",
                                "updated_at": "2018-05-31 03:00:14",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 151,
                                "matricula": "14708",
                                "name": "HERNANDEZ POZ ANA BERNARDA",
                                "email": "anaber_1104@hotmail.com",
                                "telefono": "50190703",
                                "nickname": "anitamdgua",
                                "_code": "GUA-235-Zrf",
                                "created_at": "2018-05-31 03:07:05",
                                "updated_at": "2018-06-10 01:36:08",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 152,
                                "matricula": "14066",
                                "name": "ACAJABON CARRILLO JULIO DAVID",
                                "email": "juliodavidac82@gmail.com",
                                "telefono": "41507602",
                                "nickname": "JULIUS",
                                "_code": "GUA-744-fsF",
                                "created_at": "2018-05-31 03:07:35",
                                "updated_at": "2018-06-16 20:50:44",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 153,
                                "matricula": "7364",
                                "name": "Betzabeth Rebeca colmenarez",
                                "email": "betzabeth9@hotmail.com",
                                "telefono": "51931474",
                                "nickname": "Betza",
                                "_code": "GUA-140-Wex",
                                "created_at": "2018-05-31 03:33:30",
                                "updated_at": "2018-05-31 03:33:30",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 154,
                                "matricula": "8370",
                                "name": "FIGUEROA VILLEDA MILTON",
                                "email": "wwwdocmfv@hotmail.es",
                                "telefono": "56903469",
                                "nickname": "midoc",
                                "_code": "GUA-029-6kV",
                                "created_at": "2018-05-31 04:20:21",
                                "updated_at": "2018-05-31 04:20:21",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 155,
                                "matricula": "11423",
                                "name": "HERRERA MEDINA NORA VANESSA",
                                "email": "vane2986@hotmail.com",
                                "telefono": "98832356",
                                "nickname": "98832356",
                                "_code": "Hon-736-yLR",
                                "created_at": "2018-05-31 04:50:46",
                                "updated_at": "2018-05-31 04:50:46",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 156,
                                "matricula": "18609",
                                "name": "BOCANEGRA  AGUILAR  JOSE  ALBERTO",
                                "email": "jabocanegramd@gmail.com",
                                "telefono": "30182360",
                                "nickname": "Chepe",
                                "_code": "GUA-896-myh",
                                "created_at": "2018-05-31 05:29:04",
                                "updated_at": "2018-05-31 05:29:04",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 157,
                                "matricula": "6195",
                                "name": "Cristina Soto Castro",
                                "email": "drsoto_castro@yahoo.com",
                                "telefono": "88245359",
                                "nickname": "Cris",
                                "_code": "COR-034-777",
                                "created_at": "2018-05-31 05:39:36",
                                "updated_at": "2018-07-10 10:48:35",
                                "puntos": 121
                            }
                        },
                        {
                            "user": {
                                "id": 158,
                                "matricula": "9564",
                                "name": "RODRÍGUEZ PORTILLO JUAN CARLOS",
                                "email": "perlakarina1973@gmail.com",
                                "telefono": "47498208",
                                "nickname": "JuanCarlos",
                                "_code": "GUA-529-cLn",
                                "created_at": "2018-05-31 05:51:44",
                                "updated_at": "2018-05-31 05:51:44",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 159,
                                "matricula": "11631",
                                "name": "GAMBOA SANCHEZ MAGALY",
                                "email": "m.gamboa06@hotmail.es",
                                "telefono": "84408745",
                                "nickname": "Magalita",
                                "_code": "COR-805-P84",
                                "created_at": "2018-05-31 06:45:24",
                                "updated_at": "2018-05-31 06:45:24",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 160,
                                "matricula": "10973",
                                "name": "BRIZUELA ZARCO FRAYA MARIA",
                                "email": "fbrizuela_13@yahoo.com",
                                "telefono": "88937379",
                                "nickname": "Fraya",
                                "_code": "cor-769-7me",
                                "created_at": "2018-05-31 06:53:42",
                                "updated_at": "2018-05-31 06:53:42",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 161,
                                "matricula": "7832",
                                "name": "MONTENEGRO PAYES JUSTO ABRAHAM",
                                "email": "corpolivos@gmail.com",
                                "telefono": "57173576",
                                "nickname": "cito",
                                "_code": "GUA-537-qYf",
                                "created_at": "2018-05-31 07:30:30",
                                "updated_at": "2018-05-31 07:30:30",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 162,
                                "matricula": "16496",
                                "name": "Raul Saravia Urrutia",
                                "email": "raulito0601@hotmail.com",
                                "telefono": "71897458",
                                "nickname": "Raulito",
                                "_code": "SAL-442-8u1",
                                "created_at": "2018-05-31 07:51:44",
                                "updated_at": "2018-05-31 07:51:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 163,
                                "matricula": "6021",
                                "name": "PINEDA RIVERA ERWIN ROLANDO",
                                "email": "jorgesandovalsuria@gmail.com",
                                "telefono": "51926272",
                                "nickname": "DRPin",
                                "_code": "GUA-361-VXp",
                                "created_at": "2018-05-31 07:58:29",
                                "updated_at": "2018-06-14 06:31:47",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 164,
                                "matricula": "18353",
                                "name": "Salvador Antonio Aguilar Rodríguez",
                                "email": "salvagui9@gmail.com",
                                "telefono": "48301980",
                                "nickname": "SAAR",
                                "_code": "GUA-442-jKd",
                                "created_at": "2018-05-31 08:00:56",
                                "updated_at": "2018-06-23 20:06:27",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 165,
                                "matricula": "1011985340",
                                "name": "Eduardo Gabrie",
                                "email": "egabries@gmail.com",
                                "telefono": "99914742",
                                "nickname": "Guayo",
                                "_code": "HON-561-SSG",
                                "created_at": "2018-05-31 09:03:08",
                                "updated_at": "2018-05-31 09:03:08",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 166,
                                "matricula": "12867",
                                "name": "cesar mauricio velasquez lara",
                                "email": "cesma_vela@hotmail.com",
                                "telefono": "+50499079388",
                                "nickname": "cesar",
                                "_code": "HON-474-v8I",
                                "created_at": "2018-05-31 16:44:08",
                                "updated_at": "2018-05-31 16:44:08",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 167,
                                "matricula": "7774",
                                "name": "LOPEZ PAYES JOSE FERNANDO",
                                "email": "fernandolopezpayes@gmail.com",
                                "telefono": "53186385",
                                "nickname": "NandoL",
                                "_code": "GUA-772-FFq",
                                "created_at": "2018-05-31 19:21:22",
                                "updated_at": "2018-05-31 19:21:22",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 168,
                                "matricula": "15823",
                                "name": "Walfred Escobar Calderon",
                                "email": "walfred53@hotmail.com",
                                "telefono": "56302250",
                                "nickname": "walff",
                                "_code": "GUA-210-pxH",
                                "created_at": "2018-05-31 19:30:10",
                                "updated_at": "2018-05-31 19:30:10",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 169,
                                "matricula": "10934",
                                "name": "María Jesús Rojas Solano",
                                "email": "marijrojass@gmail.com",
                                "telefono": "89096759",
                                "nickname": "Marij",
                                "_code": "COR-292-ilW",
                                "created_at": "2018-05-31 19:44:31",
                                "updated_at": "2018-06-14 05:44:37",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 170,
                                "matricula": "14808",
                                "name": "Carlos efrain montesino herrera",
                                "email": "drcemh@hotmail.com",
                                "telefono": "71802664",
                                "nickname": "Boludo",
                                "_code": "SAL-209-fQ2",
                                "created_at": "2018-05-31 21:24:59",
                                "updated_at": "2018-05-31 21:24:59",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 171,
                                "matricula": "6741",
                                "name": "Jerez Magaña Alvaro Antonio",
                                "email": "ajerezm@gmail.com",
                                "telefono": "55219241",
                                "nickname": "ajerezm@gmail.com",
                                "_code": "GUA-519-MOD",
                                "created_at": "2018-05-31 21:47:44",
                                "updated_at": "2018-05-31 21:47:44",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 172,
                                "matricula": "19011210448",
                                "name": "Dina María Guillén Almendares",
                                "email": "dimaga881010@gmail.com",
                                "telefono": "89089266",
                                "nickname": "Zafiro",
                                "_code": "HON-786-r3T",
                                "created_at": "2018-06-01 00:13:20",
                                "updated_at": "2018-06-01 00:13:20",
                                "puntos": 49
                            }
                        },
                        {
                            "user": {
                                "id": 173,
                                "matricula": "9136",
                                "name": "ROMERO GARCÍA LESSI ROXANA",
                                "email": "roxa.lrr@gmail.com",
                                "telefono": "97958089",
                                "nickname": "Lessyromero",
                                "_code": "HON-934-x68",
                                "created_at": "2018-06-01 00:28:31",
                                "updated_at": "2018-07-10 09:03:09",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 174,
                                "matricula": "16577",
                                "name": "EDGAR LAU",
                                "email": "lauedgar.21@gmail.com",
                                "telefono": "42403017",
                                "nickname": "Lau",
                                "_code": "GUA-607-1XH",
                                "created_at": "2018-06-01 00:33:17",
                                "updated_at": "2018-06-16 16:04:08",
                                "puntos": 65
                            }
                        },
                        {
                            "user": {
                                "id": 175,
                                "matricula": "5629",
                                "name": "MORALES SANCHEZ JUAN SAUL",
                                "email": "drsaulmorales@hotmail.com",
                                "telefono": "54042749",
                                "nickname": "drsaulmorales@hotmail.com",
                                "_code": "GUA-626-MU8",
                                "created_at": "2018-06-01 00:37:03",
                                "updated_at": "2018-07-10 00:38:16",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 176,
                                "matricula": "5235",
                                "name": "RIVERA REGNER",
                                "email": "rorr24@msn.com",
                                "telefono": "94411525",
                                "nickname": "DR RIVERA",
                                "_code": "HON-780-nCK",
                                "created_at": "2018-06-01 00:43:46",
                                "updated_at": "2018-06-14 21:32:49",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 177,
                                "matricula": "6746",
                                "name": "Carcamo Maradiaga Omar",
                                "email": "omaradiagacarcamo@gmail.com",
                                "telefono": "99264802",
                                "nickname": "omaradiaga",
                                "_code": "HON-140-6re",
                                "created_at": "2018-06-01 01:23:36",
                                "updated_at": "2018-06-01 01:23:36",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 178,
                                "matricula": "10628",
                                "name": "CAR XICOY DE TELLO FLOR DE MARIA",
                                "email": "flor.car99@gmail.com",
                                "telefono": "55502771",
                                "nickname": "Flor Car",
                                "_code": "GUA-386-73K",
                                "created_at": "2018-06-01 02:46:34",
                                "updated_at": "2018-06-01 02:46:34",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 179,
                                "matricula": "6764",
                                "name": "JUAREZ PAIZ LUIS ALFONZO",
                                "email": "luisajpaiz81@yahoo.com",
                                "telefono": "55106005",
                                "nickname": "luisajpaiz81",
                                "_code": "gua-391-sko",
                                "created_at": "2018-06-01 02:56:52",
                                "updated_at": "2018-06-01 02:56:52",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 180,
                                "matricula": "3516",
                                "name": "CALDERON  DONIS  EDWIN  ROBERTO",
                                "email": "ercd55@gmail.com",
                                "telefono": "57875105",
                                "nickname": "Yomero55",
                                "_code": "GUA-464-pNQ",
                                "created_at": "2018-06-01 02:56:59",
                                "updated_at": "2018-06-01 02:56:59",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 181,
                                "matricula": "11560",
                                "name": "BERRIOS WILBERT",
                                "email": "wiberrioses@gmail.com",
                                "telefono": "84320529",
                                "nickname": "crack",
                                "_code": "NIC-844-KEx",
                                "created_at": "2018-06-01 03:35:10",
                                "updated_at": "2018-06-01 03:35:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 182,
                                "matricula": "3380",
                                "name": "FLORESMARIO ERNESTO",
                                "email": "clinicafloresargueta@hotmail.com",
                                "telefono": "22637354",
                                "nickname": "mfloresp",
                                "_code": "SAL-218-hx9",
                                "created_at": "2018-06-01 04:08:42",
                                "updated_at": "2018-06-14 08:01:44",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 183,
                                "matricula": "11316",
                                "name": "PONCE VALLE DE CIFUENTES FLOR DE MARIA",
                                "email": "flormaripc@gmail.com",
                                "telefono": "54147864",
                                "nickname": "flormaripc@gmail.com",
                                "_code": "GUA-215-zQE",
                                "created_at": "2018-06-01 04:33:38",
                                "updated_at": "2018-06-01 04:33:38",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 185,
                                "matricula": "5194",
                                "name": "MARIA LUISA MONROY ESCOBAR",
                                "email": "mlmmonroy2@hotmail.com",
                                "telefono": "53251280",
                                "nickname": "mlmmonroy2",
                                "_code": "GUA-688-5B0",
                                "created_at": "2018-06-01 04:38:00",
                                "updated_at": "2018-06-01 04:38:00",
                                "puntos": 124
                            }
                        },
                        {
                            "user": {
                                "id": 186,
                                "matricula": "801197904684",
                                "name": "Cesar Salgado",
                                "email": "cesarandressalgado@gmail.com",
                                "telefono": "98080136",
                                "nickname": "cesarito16",
                                "_code": "HON-400-Obk",
                                "created_at": "2018-06-01 05:45:32",
                                "updated_at": "2018-06-01 05:45:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 187,
                                "matricula": "15067",
                                "name": "PEREZ AROSTEGUI FAUBRICIO",
                                "email": "fauricioperez@gmail.com",
                                "telefono": "89057846",
                                "nickname": "FAURICIO",
                                "_code": "NIC-618-64M",
                                "created_at": "2018-06-01 06:02:04",
                                "updated_at": "2018-06-01 06:02:04",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 188,
                                "matricula": "5791",
                                "name": "Edwin Rosselli Sabillon Paredes",
                                "email": "edwinrsabillon@gmail.com",
                                "telefono": "50495118052",
                                "nickname": "Dr. Sabillon",
                                "_code": "HON-707-wmM",
                                "created_at": "2018-06-01 06:07:36",
                                "updated_at": "2018-06-01 06:07:36",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 189,
                                "matricula": "13966",
                                "name": "Víctor Enrique Montes Rauda",
                                "email": "enriquem0470@gmail.com",
                                "telefono": "74596273",
                                "nickname": "vmontes86",
                                "_code": "SAL-633-gj2",
                                "created_at": "2018-06-01 06:22:43",
                                "updated_at": "2018-06-01 06:22:43",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 190,
                                "matricula": "2948",
                                "name": "FUENTES ESCOBAR, GUSTAVO ADOLFO",
                                "email": "ottorolan1998@gmail.com",
                                "telefono": "58650912",
                                "nickname": "gfuentesescobar",
                                "_code": "GUA-754-Z0r",
                                "created_at": "2018-06-01 06:24:25",
                                "updated_at": "2018-06-01 06:24:25",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 191,
                                "matricula": "6972",
                                "name": "SORIANO JOSE ROBERTO",
                                "email": "rostid1916@yahoo.es",
                                "telefono": "75989405",
                                "nickname": "JOSRO",
                                "_code": "SAL-751-dvE",
                                "created_at": "2018-06-01 06:36:11",
                                "updated_at": "2018-06-01 06:36:11",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 192,
                                "matricula": "8016",
                                "name": "Medarda Lopez",
                                "email": "medy_hn@yahoo.com",
                                "telefono": "97852424",
                                "nickname": "Medy",
                                "_code": "HON-268-Sgk",
                                "created_at": "2018-06-01 06:38:41",
                                "updated_at": "2018-06-01 06:38:41",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 193,
                                "matricula": "7724",
                                "name": "TORALLA DE LEON CARLOS MANUEL",
                                "email": "carlostoralla@gmail.com",
                                "telefono": "502 55286814",
                                "nickname": "Carlos",
                                "_code": "GUA-764-BXJ",
                                "created_at": "2018-06-01 06:53:55",
                                "updated_at": "2018-06-01 06:53:55",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 194,
                                "matricula": "542268",
                                "name": "Irene del Carmen Baltodano Hondoy",
                                "email": "albanoub_95@hotmail.com",
                                "telefono": "88668750",
                                "nickname": "Ireneb",
                                "_code": "Nic-856-bzs",
                                "created_at": "2018-06-01 07:18:16",
                                "updated_at": "2018-06-01 07:18:16",
                                "puntos": 54
                            }
                        },
                        {
                            "user": {
                                "id": 195,
                                "matricula": "15651",
                                "name": "PRADO DAVID",
                                "email": "davidaprado@gmail.com",
                                "telefono": "53187847",
                                "nickname": "Prado",
                                "_code": "GUA-889-MGp",
                                "created_at": "2018-06-01 08:08:48",
                                "updated_at": "2018-06-29 19:07:54",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 196,
                                "matricula": "10039",
                                "name": "SANTOS GOMEZ CINTHYA VANESSA",
                                "email": "cinthyasantoshn@gmail.com",
                                "telefono": "33071459",
                                "nickname": "Vane_hn",
                                "_code": "HON-263-H4m",
                                "created_at": "2018-06-01 10:10:12",
                                "updated_at": "2018-06-01 10:10:12",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 197,
                                "matricula": "10333",
                                "name": "FLORES ORDOÑEZ MARIO RENE",
                                "email": "marxflo@hotmail.com",
                                "telefono": "54127984",
                                "nickname": "gordo",
                                "_code": "gua-146-c8r",
                                "created_at": "2018-06-01 19:56:47",
                                "updated_at": "2018-06-01 19:56:47",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 198,
                                "matricula": "11554",
                                "name": "SALAMANCA DIAZ RENE ALEXANDER",
                                "email": "drsalamancaes@hotmail.com",
                                "telefono": "71601118",
                                "nickname": "RASSILVER503",
                                "_code": "SAL-803-IPc",
                                "created_at": "2018-06-01 20:03:21",
                                "updated_at": "2018-06-01 20:03:21",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 199,
                                "matricula": "18857",
                                "name": "IPIÑA ESPAÑA SINDY M.",
                                "email": "shindipies2301@gmail.com",
                                "telefono": "56304215",
                                "nickname": "Dra. Sindy Ipiña",
                                "_code": "GUA-443-VH7",
                                "created_at": "2018-06-01 20:10:42",
                                "updated_at": "2018-06-01 20:10:42",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 200,
                                "matricula": "4103",
                                "name": "CASTILLO GUTIÉRREZ EDGAR OSWALDO",
                                "email": "clinicaedcastillo@yahoo.es",
                                "telefono": "22538003",
                                "nickname": "WaldoCas",
                                "_code": "GUA-328-iQB",
                                "created_at": "2018-06-01 21:14:18",
                                "updated_at": "2018-06-01 21:14:18",
                                "puntos": 47
                            }
                        },
                        {
                            "user": {
                                "id": 201,
                                "matricula": "12221",
                                "name": "PALOMO ROBLES ANA LUCIA",
                                "email": "analuderoble@hotmail.es",
                                "telefono": "56510582",
                                "nickname": "Lucy de Robles",
                                "_code": "GUA-146-gga",
                                "created_at": "2018-06-01 21:24:47",
                                "updated_at": "2018-06-01 21:24:47",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 202,
                                "matricula": "10691",
                                "name": "MONESTEL BRENES DALLEN",
                                "email": "dallen285@gmail.com",
                                "telefono": "83990091",
                                "nickname": "dallen",
                                "_code": "COR-646-Gv9",
                                "created_at": "2018-06-01 21:37:15",
                                "updated_at": "2018-06-01 21:37:15",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 203,
                                "matricula": "13391",
                                "name": "Luis Enrique Mora Lopez",
                                "email": "luisemora@gmail.com",
                                "telefono": "6006-8406",
                                "nickname": "luisemora",
                                "_code": "COR-073-wYG",
                                "created_at": "2018-06-01 23:54:34",
                                "updated_at": "2018-06-01 23:54:34",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 204,
                                "matricula": "13958",
                                "name": "CORADO ESCOBAR KAREN ELIZABETH",
                                "email": "dra.kaelcoes@hotmail.com",
                                "telefono": "42177128",
                                "nickname": "Dra.KarenCorado",
                                "_code": "GUA-210-AEl",
                                "created_at": "2018-06-02 00:59:47",
                                "updated_at": "2018-06-02 00:59:47",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 205,
                                "matricula": "6841",
                                "name": "CARDONA CRISTINA",
                                "email": "ccardona@gildan.com",
                                "telefono": "98061038",
                                "nickname": "Cristy",
                                "_code": "HON-381-hv1",
                                "created_at": "2018-06-02 02:12:55",
                                "updated_at": "2018-06-02 02:12:55",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 206,
                                "matricula": "12561",
                                "name": "Evelyn Renata Anzueto Vargas",
                                "email": "evanzueto@gmail.com",
                                "telefono": "42144972",
                                "nickname": "Renata",
                                "_code": "GUA-837-1Dl",
                                "created_at": "2018-06-02 02:17:48",
                                "updated_at": "2018-06-02 02:17:48",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 207,
                                "matricula": "20302",
                                "name": "José Sánchez González",
                                "email": "drsanchezmyc10@gmail.com",
                                "telefono": "56168391",
                                "nickname": "Dr jose",
                                "_code": "GUA-897-ifb",
                                "created_at": "2018-06-02 02:57:23",
                                "updated_at": "2018-06-02 02:57:23",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 208,
                                "matricula": "0",
                                "name": "NO NAME - NEW USER",
                                "email": "edgar.berducido@yahoo.com",
                                "telefono": "58344679",
                                "nickname": "edgar",
                                "_code": "GUA-241-cSD",
                                "created_at": "2018-06-02 03:50:57",
                                "updated_at": "2018-06-02 03:50:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 209,
                                "matricula": "5677",
                                "name": "CASTRO PIMENTEL LILIANA DEL CARMEN",
                                "email": "francisquitocastro@gmail.com",
                                "telefono": "70824038",
                                "nickname": "Chiqui",
                                "_code": "SAL-110-Qi7",
                                "created_at": "2018-06-02 04:25:43",
                                "updated_at": "2018-06-02 04:25:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 210,
                                "matricula": "9772",
                                "name": "CLARISSA CHINCHILLA",
                                "email": "claryisabel15@gmail.com",
                                "telefono": "95483072",
                                "nickname": "claryisabel15",
                                "_code": "HON-481-OYS",
                                "created_at": "2018-06-02 05:04:15",
                                "updated_at": "2018-06-02 05:04:15",
                                "puntos": 42
                            }
                        },
                        {
                            "user": {
                                "id": 211,
                                "matricula": "8154",
                                "name": "RUIZ CRUZ LUIS ALFREDO",
                                "email": "lruiz324@gmail.com",
                                "telefono": "23857694",
                                "nickname": "DrLRuiz",
                                "_code": "GUA-992-27R",
                                "created_at": "2018-06-02 07:42:27",
                                "updated_at": "2018-06-02 07:42:27",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 212,
                                "matricula": "12789",
                                "name": "Jessica",
                                "email": "jsanchezflores21@gmail.com",
                                "telefono": "89979190",
                                "nickname": "Jessi21",
                                "_code": "COR-277-Zhg",
                                "created_at": "2018-06-02 08:29:54",
                                "updated_at": "2018-06-02 08:29:54",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 213,
                                "matricula": "12654",
                                "name": "Marìa Elsa",
                                "email": "asleperez@yahoo.es",
                                "telefono": "83257117",
                                "nickname": "Airam",
                                "_code": "NIC-690-a8y",
                                "created_at": "2018-06-02 09:19:56",
                                "updated_at": "2018-06-02 09:19:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 214,
                                "matricula": "17106",
                                "name": "ARMAS GODOY ELISA ANDREA",
                                "email": "richiandre421@gmail.com",
                                "telefono": "59492373",
                                "nickname": "Richiandre",
                                "_code": "GUA-087-RA4",
                                "created_at": "2018-06-02 17:53:47",
                                "updated_at": "2018-06-02 17:53:47",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 215,
                                "matricula": "7831",
                                "name": "GOMEZ VILLANUEVA CESAR FEDERICO",
                                "email": "gcesarfederico@yahoo.com",
                                "telefono": "2662-4952",
                                "nickname": "kily",
                                "_code": "SAL-007-cNX",
                                "created_at": "2018-06-02 18:44:48",
                                "updated_at": "2018-06-02 18:44:48",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 216,
                                "matricula": "8574",
                                "name": "GALVEZ  ORTEGA  CARMEN  LIZETTE",
                                "email": "mother1mely@gmail.com",
                                "telefono": "54381651",
                                "nickname": "lizeth",
                                "_code": "GUA-755-98u",
                                "created_at": "2018-06-02 18:52:04",
                                "updated_at": "2018-06-02 18:52:04",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 217,
                                "matricula": "10313",
                                "name": "Isaac Mayorga Cascante",
                                "email": "isagerma@hotmail.com",
                                "telefono": "89077543",
                                "nickname": "isaac",
                                "_code": "COR-797-kfs",
                                "created_at": "2018-06-02 19:44:16",
                                "updated_at": "2018-06-02 19:44:16",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 218,
                                "matricula": "6377",
                                "name": "LAZO CABRERA MARVIN",
                                "email": "drmarvinlazo@yahoo.com",
                                "telefono": "99881485",
                                "nickname": "lacito",
                                "_code": "HON-778-Jwx",
                                "created_at": "2018-06-02 19:46:26",
                                "updated_at": "2018-06-02 19:46:26",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 219,
                                "matricula": "11382",
                                "name": "TRUJILLO AYALA EDGAR ALFREDO",
                                "email": "freddy_trujillo@msn.com",
                                "telefono": "78106340",
                                "nickname": "Trujillo",
                                "_code": "SAL-538-wmi",
                                "created_at": "2018-06-02 21:16:02",
                                "updated_at": "2018-06-02 21:16:02",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 220,
                                "matricula": "7162",
                                "name": "MOSCOSO BURGOS, CARLOS ESTUARDO",
                                "email": "stuardomoscosob@gmail.com",
                                "telefono": "55221010",
                                "nickname": "Chito",
                                "_code": "GUA-498-DVP",
                                "created_at": "2018-06-02 21:17:09",
                                "updated_at": "2018-06-06 21:52:07",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 221,
                                "matricula": "12154",
                                "name": "TEPEU GUTIERRES  MATEO",
                                "email": "tepeugutierrezmateo@gmail.com",
                                "telefono": "54227546",
                                "nickname": "tepeugutierrezmateo@gmail.com",
                                "_code": "GUA-831-eKX",
                                "created_at": "2018-06-02 23:13:26",
                                "updated_at": "2018-06-02 23:13:26",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 222,
                                "matricula": "3537",
                                "name": "MARIN MONGE CARLOS",
                                "email": "tmarinch98@gmail.com",
                                "telefono": "89981885",
                                "nickname": "TATS98",
                                "_code": "COR-630-yl8",
                                "created_at": "2018-06-03 01:15:24",
                                "updated_at": "2018-06-03 01:15:24",
                                "puntos": 62
                            }
                        },
                        {
                            "user": {
                                "id": 223,
                                "matricula": "8349",
                                "name": "ALBUREZ RODENAS MARCO VINICIO",
                                "email": "mvalburez@gmail.com",
                                "telefono": "56511740",
                                "nickname": "Vinicio Alburez",
                                "_code": "GUA-202-MYt",
                                "created_at": "2018-06-03 01:31:57",
                                "updated_at": "2018-06-03 01:31:57",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 224,
                                "matricula": "6551",
                                "name": "Ivan Lemus",
                                "email": "drivanelemus@gmail.com",
                                "telefono": "42192599",
                                "nickname": "Dr_Lemus",
                                "_code": "GUA-995-ksf",
                                "created_at": "2018-06-03 02:37:39",
                                "updated_at": "2018-06-03 02:37:39",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 225,
                                "matricula": "7473",
                                "name": "MENDEZ DE LEMUS INGRID JEANETH",
                                "email": "drajeanethdelemus@yahoo.es",
                                "telefono": "55789392",
                                "nickname": "Dra_deLemus",
                                "_code": "GUA-597-bP5",
                                "created_at": "2018-06-03 02:49:45",
                                "updated_at": "2018-06-03 02:49:45",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 226,
                                "matricula": "9457",
                                "name": "Jose Antonio",
                                "email": "aroman1silva@gmail.com",
                                "telefono": "50164878",
                                "nickname": "aroman",
                                "_code": "GUA-197-qMP",
                                "created_at": "2018-06-03 03:42:13",
                                "updated_at": "2018-06-03 03:42:13",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 227,
                                "matricula": "12848",
                                "name": "Karina Zamora Esquivel",
                                "email": "karizamora89@gmail.com",
                                "telefono": "87947694",
                                "nickname": "kzamorae",
                                "_code": "COR-092-7i3",
                                "created_at": "2018-06-03 06:31:52",
                                "updated_at": "2018-06-16 05:35:26",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 228,
                                "matricula": "18261",
                                "name": "Gerardo Godínez",
                                "email": "gerard_vgt88@hotmail.com",
                                "telefono": "55116188",
                                "nickname": "Gerard1088",
                                "_code": "GUA-215-q58",
                                "created_at": "2018-06-03 09:33:29",
                                "updated_at": "2018-06-29 23:21:50",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 229,
                                "matricula": "10687",
                                "name": "FERNANDO DANIEL LANZA ANDINO",
                                "email": "fdlanza@hotmail.com",
                                "telefono": "+504-98033629",
                                "nickname": "fdlanza",
                                "_code": "HON-770-xcd",
                                "created_at": "2018-06-03 19:11:01",
                                "updated_at": "2018-06-03 19:11:01",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 230,
                                "matricula": "8665",
                                "name": "CHAGUACEDA  VASQUEZ  LEONOR",
                                "email": "leonorchaguaceda@yahoo.com",
                                "telefono": "54602086",
                                "nickname": "Leonor",
                                "_code": "gua-711-cip",
                                "created_at": "2018-06-03 20:17:28",
                                "updated_at": "2018-06-03 20:17:28",
                                "puntos": 29
                            }
                        },
                        {
                            "user": {
                                "id": 231,
                                "matricula": "5434",
                                "name": "OROZCO ANA LUISA",
                                "email": "aloh5434@hotmail.com",
                                "telefono": "55496456",
                                "nickname": "rana",
                                "_code": "GUA-219-oEu",
                                "created_at": "2018-06-03 20:30:36",
                                "updated_at": "2018-06-03 20:30:36",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 232,
                                "matricula": "8713",
                                "name": "DE FLORES PATRICIA ADELAIDA CENTENO",
                                "email": "pituka2.919@gmail.com",
                                "telefono": "78933689",
                                "nickname": "pituka2.919@gmakl.com",
                                "_code": "SAL-026-9WD",
                                "created_at": "2018-06-03 20:56:19",
                                "updated_at": "2018-06-03 20:56:19",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 233,
                                "matricula": "2895",
                                "name": "Rolando",
                                "email": "drcastfunes@gmail.com",
                                "telefono": "57091016",
                                "nickname": "Roly",
                                "_code": "GUA-073-b7q",
                                "created_at": "2018-06-04 00:04:11",
                                "updated_at": "2018-06-04 00:04:11",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 234,
                                "matricula": "3413",
                                "name": "KING MENENDEZ MIGUEL ANTONIO",
                                "email": "drmiguelking@gmail.com",
                                "telefono": "52025520",
                                "nickname": "Miguel",
                                "_code": "GUA-198-y6q",
                                "created_at": "2018-06-04 02:09:51",
                                "updated_at": "2018-06-04 02:09:51",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 235,
                                "matricula": "15328",
                                "name": "ULBAN LEMUS KARLA MICHELLE",
                                "email": "michiulban@gmail.com",
                                "telefono": "45614187",
                                "nickname": "Mishi",
                                "_code": "GUA-885-Wst",
                                "created_at": "2018-06-04 03:02:46",
                                "updated_at": "2018-06-04 03:02:46",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 236,
                                "matricula": "4275",
                                "name": "MONTOYA EDWIN JORGE",
                                "email": "alex_montoya14@outlook.com",
                                "telefono": "72635890",
                                "nickname": "Edwin",
                                "_code": "SAL-859-SEw",
                                "created_at": "2018-06-04 03:03:46",
                                "updated_at": "2018-06-04 03:03:46",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 237,
                                "matricula": "7906",
                                "name": "HICHOS AVELLANEDA OSCAR",
                                "email": "drhichos@yahoo.com",
                                "telefono": "55068979",
                                "nickname": "oscar",
                                "_code": "GUA-656-Ld2",
                                "created_at": "2018-06-04 03:07:57",
                                "updated_at": "2018-06-04 03:07:57",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 238,
                                "matricula": "1933",
                                "name": "Quesada Gatjeans Gerardo",
                                "email": "docquesada@yahoo.com",
                                "telefono": "83946949",
                                "nickname": "Gerardo QG.",
                                "_code": "COR-534-Sjs",
                                "created_at": "2018-06-04 03:29:42",
                                "updated_at": "2018-06-04 03:29:42",
                                "puntos": 116
                            }
                        },
                        {
                            "user": {
                                "id": 239,
                                "matricula": "8089",
                                "name": "Mirtha helena rodriguez",
                                "email": "mhrg2106@gmail.com",
                                "telefono": "83217544",
                                "nickname": "Juanda",
                                "_code": "COR-881-HCo",
                                "created_at": "2018-06-04 03:37:00",
                                "updated_at": "2018-06-04 03:37:00",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 240,
                                "matricula": "3178",
                                "name": "Fabricio Rodezno",
                                "email": "fabricio.rodezno@porsalud.net",
                                "telefono": "50494780559",
                                "nickname": "Doctor",
                                "_code": "HON-312-WSK",
                                "created_at": "2018-06-04 04:24:30",
                                "updated_at": "2018-06-04 04:24:30",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 241,
                                "matricula": "13385",
                                "name": "CASTRO ARAYA GAHUDY",
                                "email": "gcastro.cx@gmail.com",
                                "telefono": "83480408",
                                "nickname": "Gaudy",
                                "_code": "COR-295-7g8",
                                "created_at": "2018-06-04 05:53:47",
                                "updated_at": "2018-06-04 05:53:47",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 242,
                                "matricula": "8237",
                                "name": "MUÑOZ GOMEZ DE SCHOENFELD ILIANA LISETH",
                                "email": "lisms312@gmail.com",
                                "telefono": "31590959",
                                "nickname": "Lisset Muñóz",
                                "_code": "GUA-922-rHA",
                                "created_at": "2018-06-04 06:06:55",
                                "updated_at": "2018-06-04 06:06:55",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 243,
                                "matricula": "14710",
                                "name": "Silvia Núñez Solano",
                                "email": "silnuso@gmail.com",
                                "telefono": "83260837",
                                "nickname": "silvianuso",
                                "_code": "COR-888-1i1",
                                "created_at": "2018-06-04 06:11:36",
                                "updated_at": "2018-06-04 06:11:36",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 244,
                                "matricula": "5643",
                                "name": "CARBAJAL SIERRA PAULO CESAR",
                                "email": "pauloc1331@yahoo.com",
                                "telefono": "97001018",
                                "nickname": "pique",
                                "_code": "hon-710-ak7",
                                "created_at": "2018-06-04 06:14:13",
                                "updated_at": "2018-06-04 06:14:13",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 245,
                                "matricula": "13738",
                                "name": "RAMIREZ RUIZ ANIBAL BENICIO",
                                "email": "aramirez50@yahoo.com.mx",
                                "telefono": "88871832",
                                "nickname": "Ani",
                                "_code": "NIC-862-TpW",
                                "created_at": "2018-06-04 06:32:09",
                                "updated_at": "2018-06-04 06:32:09",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 246,
                                "matricula": "3042",
                                "name": "ZUNIGA OSLIN",
                                "email": "oslinzuniga@hotmail.com",
                                "telefono": "97632135",
                                "nickname": "Oslin",
                                "_code": "HON-467-n3b",
                                "created_at": "2018-06-04 06:33:32",
                                "updated_at": "2018-06-04 06:33:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 247,
                                "matricula": "2151",
                                "name": "Castro Ugalde Jorge Arturo",
                                "email": "jacusacr@yahoo.es",
                                "telefono": "89139953",
                                "nickname": "Jacu",
                                "_code": "Cor-582-5nu",
                                "created_at": "2018-06-04 07:41:48",
                                "updated_at": "2018-06-04 07:41:48",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 248,
                                "matricula": "6155",
                                "name": "Luis David López Sánchez,",
                                "email": "drdavid2014.ll@gmail.com",
                                "telefono": "94342630",
                                "nickname": "David",
                                "_code": "HON-172-huB",
                                "created_at": "2018-06-04 18:15:59",
                                "updated_at": "2018-06-14 04:10:52",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 249,
                                "matricula": "14920",
                                "name": "Luz Elena Tepe M",
                                "email": "onesta.gt@gmail.com",
                                "telefono": "55553109",
                                "nickname": "LyzyJavi",
                                "_code": "GUA-973-a63",
                                "created_at": "2018-06-04 20:16:59",
                                "updated_at": "2018-06-29 07:31:41",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 250,
                                "matricula": "10980",
                                "name": "AGUILAR AGUILAR JOHANA WALESKA",
                                "email": "jwaguilar19@hotmail.com",
                                "telefono": "99827538",
                                "nickname": "Johana",
                                "_code": "HON-154-bV8",
                                "created_at": "2018-06-04 21:28:47",
                                "updated_at": "2018-06-04 21:28:47",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 251,
                                "matricula": "15101",
                                "name": "Jorge Andres Perez Fernandez",
                                "email": "drjorgeandres@gmail.com",
                                "telefono": "50198868",
                                "nickname": "DrG",
                                "_code": "GUA-521-CHI",
                                "created_at": "2018-06-04 21:53:56",
                                "updated_at": "2018-06-04 21:53:56",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 252,
                                "matricula": "12536",
                                "name": "martinez sales oscar humberto",
                                "email": "martinez_1988_24@hotmail.com",
                                "telefono": "33087385",
                                "nickname": "oscar",
                                "_code": "HON-984-wN0",
                                "created_at": "2018-06-04 22:00:06",
                                "updated_at": "2018-06-04 22:00:06",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 253,
                                "matricula": "10535",
                                "name": "RETANA ALBANES RONALDO ARMANDO",
                                "email": "ronyretana@yahoo.com",
                                "telefono": "50172029",
                                "nickname": "RONALDO1973",
                                "_code": "GUA-729-DvU",
                                "created_at": "2018-06-04 22:33:01",
                                "updated_at": "2018-06-04 22:33:01",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 254,
                                "matricula": "16880",
                                "name": "DEL VALLE GONZALEZ MARIA JOSE",
                                "email": "mariajodelvalle@gmail.com",
                                "telefono": "50197194",
                                "nickname": "Majodelvalle",
                                "_code": "GUA-896-ftj",
                                "created_at": "2018-06-04 23:20:54",
                                "updated_at": "2018-06-04 23:20:54",
                                "puntos": 130
                            }
                        },
                        {
                            "user": {
                                "id": 255,
                                "matricula": "13991",
                                "name": "PANIAGUA CHARNAUD LUIS ANDRES",
                                "email": "dr.paniagua@psiquiatrasdeguatemala.com",
                                "telefono": "30208306",
                                "nickname": "lapch",
                                "_code": "GUA-755-le5",
                                "created_at": "2018-06-04 23:33:42",
                                "updated_at": "2018-06-04 23:33:42",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 256,
                                "matricula": "16541",
                                "name": "Daniel Ramos",
                                "email": "danielerf10@live.com",
                                "telefono": "71654968",
                                "nickname": "Danielerf",
                                "_code": "SAL-931-olj",
                                "created_at": "2018-06-04 23:44:06",
                                "updated_at": "2018-06-04 23:44:06",
                                "puntos": 120
                            }
                        },
                        {
                            "user": {
                                "id": 257,
                                "matricula": "4537",
                                "name": "DEYET HERRERA CARLOS ALBERTO HERNAN",
                                "email": "hernandeyetci@gmail.com",
                                "telefono": "35178340",
                                "nickname": "Rayito",
                                "_code": "GUA-589-Smy",
                                "created_at": "2018-06-04 23:46:05",
                                "updated_at": "2018-06-04 23:46:05",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 258,
                                "matricula": "5288",
                                "name": "BERDUCIDO MORALES EDGAR ESTUARDO",
                                "email": "ednaberducido@hotmail.com",
                                "telefono": "58344679",
                                "nickname": "Eddy",
                                "_code": "GUA-886-9aY",
                                "created_at": "2018-06-05 02:45:49",
                                "updated_at": "2018-06-05 02:45:49",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 259,
                                "matricula": "11659",
                                "name": "APARICIO VASQUEZ ISIS ANELLY",
                                "email": "blanquis.larios@gmail.com",
                                "telefono": "41146298",
                                "nickname": "Blanca Larios",
                                "_code": "GUA-952-yDG",
                                "created_at": "2018-06-05 03:53:31",
                                "updated_at": "2018-07-03 07:12:46",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 260,
                                "matricula": "10257",
                                "name": "MURIILLO RALSTON ALLAN HUMBERTO",
                                "email": "allanmurillor@gmail.com",
                                "telefono": "+504 94586840",
                                "nickname": "Dr Allan Ralston",
                                "_code": "HON-810-0MP",
                                "created_at": "2018-06-05 05:04:41",
                                "updated_at": "2018-06-05 05:04:41",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 261,
                                "matricula": "11095",
                                "name": "ESTRADA CORADO DE PEREZ MIRIAN MAYBELLI",
                                "email": "dramiriamestrada2275@gmail.com",
                                "telefono": "47957753",
                                "nickname": "Dra. Estrada",
                                "_code": "GUA-450-JoM",
                                "created_at": "2018-06-05 06:19:03",
                                "updated_at": "2018-06-05 06:19:03",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 262,
                                "matricula": "13894",
                                "name": "MONZÒN LESLIE",
                                "email": "monzonleal.leslie@gmail.com",
                                "telefono": "55498450",
                                "nickname": "Team España Monzon",
                                "_code": "GUA-120-qv8",
                                "created_at": "2018-06-05 06:28:06",
                                "updated_at": "2018-06-05 06:28:06",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 263,
                                "matricula": "7532",
                                "name": "SABORIO BERMUDEZ RAMIRO MARTIN",
                                "email": "drramirosaborio@gmail.com",
                                "telefono": "88104458",
                                "nickname": "rsaborio",
                                "_code": "Nic-669-cnT",
                                "created_at": "2018-06-05 07:05:25",
                                "updated_at": "2018-06-29 05:25:55",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 264,
                                "matricula": "20935",
                                "name": "Andrea Fernanda Rivera",
                                "email": "afsandovalr@gmail.com",
                                "telefono": "\u202d30134283\u202c",
                                "nickname": "Andrea&Mike",
                                "_code": "GUA-851-fMQ",
                                "created_at": "2018-06-05 07:08:56",
                                "updated_at": "2018-06-05 07:08:56",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 265,
                                "matricula": "1958",
                                "name": "LACAYO BACA ROBERTO JOSE",
                                "email": "robertolacayo97@yahoo.com",
                                "telefono": "31796302",
                                "nickname": "Roberto",
                                "_code": "HON-972-Ksn",
                                "created_at": "2018-06-05 07:15:51",
                                "updated_at": "2018-06-05 07:15:51",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 266,
                                "matricula": "9104",
                                "name": "GUERRA PALMA GABRIEL ALEJANDRO",
                                "email": "gguerrapalma@yahoo.com",
                                "telefono": "66315430",
                                "nickname": "Gabriel Guerra",
                                "_code": "GUA-338-um4",
                                "created_at": "2018-06-05 07:36:57",
                                "updated_at": "2018-06-05 07:36:57",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 267,
                                "matricula": "3756",
                                "name": "CHIRINOS FLORES AMERICA INDOFIL",
                                "email": "achirinos3@hotmail.com",
                                "telefono": "87323550",
                                "nickname": "POLIMOX",
                                "_code": "HON-732-BjI",
                                "created_at": "2018-06-05 07:51:50",
                                "updated_at": "2018-06-05 07:51:50",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 268,
                                "matricula": "7910",
                                "name": "BARRIOS ALVARADO ERIK AUGUSTO",
                                "email": "mosquirojo2002@yahoo.com",
                                "telefono": "54017485",
                                "nickname": "",
                                "_code": "GUA-367-5s6",
                                "created_at": "2018-06-05 07:53:32",
                                "updated_at": "2018-06-05 07:53:32",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 269,
                                "matricula": "10263",
                                "name": "BRITO CIENFUEGOS ANGEL EMILIO",
                                "email": "angelemiliobrito@hotmail.com",
                                "telefono": "77293807",
                                "nickname": "AngelBrito",
                                "_code": "SAL-737-uz5",
                                "created_at": "2018-06-05 08:07:14",
                                "updated_at": "2018-06-05 08:07:14",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 270,
                                "matricula": "8477",
                                "name": "ENAMORADO PADILLA FERNANDO AUGUSTO",
                                "email": "fergust84@gmail.com",
                                "telefono": "94930007",
                                "nickname": "fernando",
                                "_code": "HON-924-P9d",
                                "created_at": "2018-06-05 08:53:15",
                                "updated_at": "2018-06-05 08:53:15",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 271,
                                "matricula": "10072",
                                "name": "MAZARIEGOS CALDERON BYRON RENE",
                                "email": "byronrene24@hotmail.com",
                                "telefono": "41772241",
                                "nickname": "Byron Rene Mazariegos Calderon",
                                "_code": "Gua-967-g3c",
                                "created_at": "2018-06-05 08:53:18",
                                "updated_at": "2018-06-17 06:59:30",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 272,
                                "matricula": "6130",
                                "name": "PALENCIA PRADO JULIO HUMBERTO",
                                "email": "dr.prevensalud@gmail.com",
                                "telefono": "23610612",
                                "nickname": "Julianpale",
                                "_code": "GUA-220-xgk",
                                "created_at": "2018-06-05 08:54:31",
                                "updated_at": "2018-06-05 08:54:31",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 273,
                                "matricula": "5403",
                                "name": "CHICAS JAVIER ANTONIO",
                                "email": "javierchicas_71@hotmail.com",
                                "telefono": "95470557",
                                "nickname": "Javier",
                                "_code": "HON-947-tkp",
                                "created_at": "2018-06-05 08:55:47",
                                "updated_at": "2018-06-05 08:55:47",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 274,
                                "matricula": "6854",
                                "name": "ZAMORA BRENES JULIA",
                                "email": "jmzb1977@hotmail.com",
                                "telefono": "88337203",
                                "nickname": "Lucky",
                                "_code": "COR-160-nQ6",
                                "created_at": "2018-06-05 10:12:10",
                                "updated_at": "2018-06-05 10:12:10",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 275,
                                "matricula": "44343",
                                "name": "César Gerónimo Martínez Gutiérrez",
                                "email": "cgmg73i@live.com",
                                "telefono": "+50588079920",
                                "nickname": "Grone13i",
                                "_code": "NIC-130-EB7",
                                "created_at": "2018-06-05 19:37:53",
                                "updated_at": "2018-06-05 19:37:53",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 276,
                                "matricula": "8820",
                                "name": "Oneydy montoya",
                                "email": "toya16hn@gmail.com",
                                "telefono": "87344545",
                                "nickname": "Oneydy",
                                "_code": "HON-878-9Eo",
                                "created_at": "2018-06-05 19:40:34",
                                "updated_at": "2018-06-05 19:40:34",
                                "puntos": 14
                            }
                        },
                        {
                            "user": {
                                "id": 277,
                                "matricula": "7159",
                                "name": "Cruz Vargas Teresa Leticia",
                                "email": "terevargas45@yahoo.com",
                                "telefono": "98128165",
                                "nickname": "Teresa",
                                "_code": "HON-111-SAo",
                                "created_at": "2018-06-05 19:56:51",
                                "updated_at": "2018-06-05 19:56:51",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 278,
                                "matricula": "0",
                                "name": "segundo jose sirias reyes",
                                "email": "segundosiriasreyes@yahoo.es",
                                "telefono": "86352197",
                                "nickname": "segundosiriasreyes@yahoo.es",
                                "_code": "NIC-725-Ga2",
                                "created_at": "2018-06-05 20:20:12",
                                "updated_at": "2018-06-05 20:20:12",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 279,
                                "matricula": "17504",
                                "name": "ACEITUNO CUELLAR LUIS EDUARDO",
                                "email": "aceituno1985@hotmail.com",
                                "telefono": "43843127",
                                "nickname": "LEAC1985",
                                "_code": "GUA-317-5fe",
                                "created_at": "2018-06-05 21:03:34",
                                "updated_at": "2018-06-17 06:01:02",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 280,
                                "matricula": "20565",
                                "name": "Pedro Luis Mérida De León",
                                "email": "piterluis9029@hotmail.com",
                                "telefono": "56925296",
                                "nickname": "Pedro",
                                "_code": "GUA-620-a1L",
                                "created_at": "2018-06-05 21:14:02",
                                "updated_at": "2018-06-05 21:14:02",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 281,
                                "matricula": "9624",
                                "name": "ROSMUNDO CAPUL EDGAR ALBERTO",
                                "email": "edgaros1@hotmail.com",
                                "telefono": "45435770",
                                "nickname": "EDGAR",
                                "_code": "GUA-382-xAE",
                                "created_at": "2018-06-05 21:15:15",
                                "updated_at": "2018-06-05 21:15:15",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 282,
                                "matricula": "15673",
                                "name": "Victor Francisco Barrios Barrios",
                                "email": "pediavbarrios@hotmail.com",
                                "telefono": "31142225",
                                "nickname": "Pancho",
                                "_code": "GUA-573-KRo",
                                "created_at": "2018-06-05 21:25:41",
                                "updated_at": "2018-06-05 21:25:41",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 283,
                                "matricula": "18762",
                                "name": "Antulio Javier Calderón",
                                "email": "drantuliocalderon@outlook.com",
                                "telefono": "50194704",
                                "nickname": "AntulioJavier",
                                "_code": "GUA-359-fj8",
                                "created_at": "2018-06-05 21:59:25",
                                "updated_at": "2018-06-05 21:59:25",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 284,
                                "matricula": "15897",
                                "name": "FIGUEROA FIGUEROA RITA MARÍA",
                                "email": "figueroa.ritamaria@gmail.com",
                                "telefono": "40045105",
                                "nickname": "Dra. Figueroa",
                                "_code": "GUA-258-PyP",
                                "created_at": "2018-06-05 22:04:43",
                                "updated_at": "2018-06-05 22:04:43",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 285,
                                "matricula": "1633",
                                "name": "SOTO QUIROS MANUEL ENRIQUE",
                                "email": "msotoqui34@yahoo.com",
                                "telefono": "22088217",
                                "nickname": "manuel",
                                "_code": "COR-021-Fop",
                                "created_at": "2018-06-05 22:10:15",
                                "updated_at": "2018-06-05 22:10:15",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 286,
                                "matricula": "12190",
                                "name": "CASTAÑEDA CUJULUM, VICTOR ROBERTO",
                                "email": "viviendoconmidiabetes@gmail.com",
                                "telefono": "24809809",
                                "nickname": "DrVC",
                                "_code": "GUA-918-dpl",
                                "created_at": "2018-06-05 22:59:47",
                                "updated_at": "2018-07-10 08:27:09",
                                "puntos": 36
                            }
                        },
                        {
                            "user": {
                                "id": 287,
                                "matricula": "14234",
                                "name": "QUINTANILLA GOMEZ CARLOS ARMANDO",
                                "email": "carlos_quintanilla01@hotmail.com",
                                "telefono": "74595797",
                                "nickname": "CarlosQ",
                                "_code": "SAL-443-vcc",
                                "created_at": "2018-06-05 23:48:29",
                                "updated_at": "2018-06-05 23:48:29",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 288,
                                "matricula": "0",
                                "name": "juan carlos velasquez lopes",
                                "email": "jcvelasquezm06@gmail.com",
                                "telefono": "87385801",
                                "nickname": "jcvelasquezm06@gmail.com",
                                "_code": "HON-808-lOM",
                                "created_at": "2018-06-06 00:41:50",
                                "updated_at": "2018-06-06 00:41:50",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 289,
                                "matricula": "9685",
                                "name": "Vázquez Rivera David Ernesto",
                                "email": "kayda.dr@gmail.com",
                                "telefono": "98597826",
                                "nickname": "Kayda",
                                "_code": "Hon-046-oiP",
                                "created_at": "2018-06-06 00:52:55",
                                "updated_at": "2018-06-06 00:52:55",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 290,
                                "matricula": "6812",
                                "name": "SALAS LOPEZ ALEXANDER",
                                "email": "alexandersalas@hotmail.com",
                                "telefono": "88474774",
                                "nickname": "Alex",
                                "_code": "COR-346-ZrU",
                                "created_at": "2018-06-06 01:00:18",
                                "updated_at": "2018-06-06 01:00:18",
                                "puntos": 53
                            }
                        },
                        {
                            "user": {
                                "id": 291,
                                "matricula": "13253",
                                "name": "RUBIO MABEL INGRID",
                                "email": "ingridrubio.5@hotmail.com",
                                "telefono": "79387004",
                                "nickname": "Ingrid",
                                "_code": "SAL-106-PLy",
                                "created_at": "2018-06-06 01:15:44",
                                "updated_at": "2018-06-06 01:15:44",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 292,
                                "matricula": "20308",
                                "name": "Walter",
                                "email": "drwrvg@gmail.com",
                                "telefono": "55551559",
                                "nickname": "WalterV",
                                "_code": "GUA-114-8oL",
                                "created_at": "2018-06-06 01:53:24",
                                "updated_at": "2018-06-06 01:53:24",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 293,
                                "matricula": "15182",
                                "name": "BARRIOS RODRIGUEZ CRISTIAN ESTUARDO",
                                "email": "cristianbarrios82@yahoo.es",
                                "telefono": "54604231",
                                "nickname": "cristianbarrios82",
                                "_code": "GUA-475-9TJ",
                                "created_at": "2018-06-06 03:01:17",
                                "updated_at": "2018-06-06 03:01:17",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 294,
                                "matricula": "7035",
                                "name": "Carlos Enrique Gomez Mayorga",
                                "email": "cegm2012@gmail.com",
                                "telefono": "30238847",
                                "nickname": "Quique",
                                "_code": "GUA-542-zaO",
                                "created_at": "2018-06-06 03:41:40",
                                "updated_at": "2018-06-14 03:30:31",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 295,
                                "matricula": "13602",
                                "name": "Madeleine Samayoa",
                                "email": "maderegi21msm@hotmail.com",
                                "telefono": "52089721",
                                "nickname": "Mae",
                                "_code": "GUA-663-5lc",
                                "created_at": "2018-06-06 04:02:37",
                                "updated_at": "2018-06-06 04:02:37",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 296,
                                "matricula": "6674",
                                "name": "GARCIA SALAS HERNANDEZ HECTOR ARMANDO",
                                "email": "hectorgsalas@gmail.com",
                                "telefono": "30280115",
                                "nickname": "El jefe",
                                "_code": "GUA-898-W6w",
                                "created_at": "2018-06-06 04:36:52",
                                "updated_at": "2018-06-06 04:36:52",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 297,
                                "matricula": "7149",
                                "name": "PISQUIY MONTES DE OCA RUBY JULIETA",
                                "email": "rubymontesdeoca@hotmail.com",
                                "telefono": "55055781",
                                "nickname": "Ruby",
                                "_code": "GUA-970-eUs",
                                "created_at": "2018-06-06 04:56:17",
                                "updated_at": "2018-06-06 04:56:17",
                                "puntos": 64
                            }
                        },
                        {
                            "user": {
                                "id": 298,
                                "matricula": "10219",
                                "name": "REYES HERNANDEZ SILVIA LISET",
                                "email": "silvia_mdreyes@yahoo.com",
                                "telefono": "58108257",
                                "nickname": "Silvia",
                                "_code": "Gua-421-Mfa",
                                "created_at": "2018-06-06 05:00:00",
                                "updated_at": "2018-06-06 05:00:00",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 299,
                                "matricula": "9178",
                                "name": "Giovanni",
                                "email": "giovanni_mdgiron@yahoo.com",
                                "telefono": "57094987",
                                "nickname": "Giovanni",
                                "_code": "GUA-083-9A0",
                                "created_at": "2018-06-06 05:13:34",
                                "updated_at": "2018-06-06 05:13:34",
                                "puntos": 56
                            }
                        },
                        {
                            "user": {
                                "id": 300,
                                "matricula": "7148",
                                "name": "ZELADA QUINIONEZ JOSE ANTONIO",
                                "email": "drzelada130655@gmail.com",
                                "telefono": "55023859",
                                "nickname": "Antonio",
                                "_code": "GUA-058-qkm",
                                "created_at": "2018-06-06 05:16:51",
                                "updated_at": "2018-06-06 05:16:51",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 301,
                                "matricula": "18357",
                                "name": "Diego Delgado",
                                "email": "diegodelgado444@hotmail.com",
                                "telefono": "31471318",
                                "nickname": "Diego",
                                "_code": "GUA-141-hqi",
                                "created_at": "2018-06-06 05:24:26",
                                "updated_at": "2018-06-06 05:24:26",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 302,
                                "matricula": "18196",
                                "name": "Rocael Cipriano Pablo Gomez",
                                "email": "r2pablo@hotmail.com",
                                "telefono": "57039756",
                                "nickname": "Rocael",
                                "_code": "GUA-846-cOS",
                                "created_at": "2018-06-06 05:55:52",
                                "updated_at": "2018-06-06 05:55:52",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 303,
                                "matricula": "13182",
                                "name": "Carlos Álvarez",
                                "email": "alvarez_cra@yahoo.es",
                                "telefono": "+50497927739",
                                "nickname": "Charlie",
                                "_code": "HON-637-TR8",
                                "created_at": "2018-06-06 06:30:29",
                                "updated_at": "2018-06-06 06:30:29",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 304,
                                "matricula": "17.767",
                                "name": "Ana Peralta",
                                "email": "anaja44@hotmail.com",
                                "telefono": "5967-7644",
                                "nickname": "Ana",
                                "_code": "GUA-744-73a",
                                "created_at": "2018-06-06 06:41:50",
                                "updated_at": "2018-07-05 02:55:55",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 305,
                                "matricula": "7911",
                                "name": "ROSA MARÍA BOBADILLA MENDÍA",
                                "email": "dagor2002gua@yahoo.com",
                                "telefono": "55014465",
                                "nickname": "rosa",
                                "_code": "GUA-599-Kuc",
                                "created_at": "2018-06-06 07:15:55",
                                "updated_at": "2018-06-06 07:15:55",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 306,
                                "matricula": "20849",
                                "name": "Ixim Anibal Morales Galindo",
                                "email": "ixim24@gmail.com",
                                "telefono": "5879 7713",
                                "nickname": "Ixim",
                                "_code": "GUA-159-c2h",
                                "created_at": "2018-06-06 07:32:13",
                                "updated_at": "2018-06-06 07:32:13",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 307,
                                "matricula": "57866",
                                "name": "JUAN ANTONIO DE CARDENAS NOA",
                                "email": "juan.noadr@gmail.com",
                                "telefono": "95101350",
                                "nickname": "antuan",
                                "_code": "HON-317-hxQ",
                                "created_at": "2018-06-06 07:44:01",
                                "updated_at": "2018-06-06 07:44:01",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 308,
                                "matricula": "6803",
                                "name": "CAMPOS DIEZ ZULLY PATRICIA",
                                "email": "zullymac5@hotmail.com",
                                "telefono": "41193513",
                                "nickname": "ZullyPat",
                                "_code": "GUA-354-AEw",
                                "created_at": "2018-06-06 07:44:28",
                                "updated_at": "2018-06-06 07:44:28",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 309,
                                "matricula": "8829",
                                "name": "MARTINEZ ACOSTA  DANIEL ALBERTO",
                                "email": "danmarcosta@gmail.com",
                                "telefono": "75076746",
                                "nickname": "Danny",
                                "_code": "SAL-973-BGX",
                                "created_at": "2018-06-06 08:44:52",
                                "updated_at": "2018-06-06 08:44:52",
                                "puntos": 44
                            }
                        },
                        {
                            "user": {
                                "id": 310,
                                "matricula": "5797",
                                "name": "RODRIGUEZ SALVADOR",
                                "email": "gastro_ceclisa@hotmail.com",
                                "telefono": "7170-7174",
                                "nickname": "Salvador",
                                "_code": "SAL-157-u3s",
                                "created_at": "2018-06-06 19:16:59",
                                "updated_at": "2018-06-06 19:16:59",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 311,
                                "matricula": "16725",
                                "name": "SANDOVAL CAMPOS DIANA",
                                "email": "dsandoval_campos@hotmail.com",
                                "telefono": "30188378",
                                "nickname": "Dianita",
                                "_code": "GUA-772-Xlu",
                                "created_at": "2018-06-06 19:30:26",
                                "updated_at": "2018-06-06 19:30:26",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 312,
                                "matricula": "16573",
                                "name": "BARRIOS BARRIOS VICTOR FRANCISCO",
                                "email": "cazulx@gmail.com",
                                "telefono": "31142225",
                                "nickname": "VICTOR",
                                "_code": "GUA-984-dFO",
                                "created_at": "2018-06-06 19:48:10",
                                "updated_at": "2018-06-06 19:48:10",
                                "puntos": 43
                            }
                        },
                        {
                            "user": {
                                "id": 313,
                                "matricula": "6798",
                                "name": "MARTINEZ ANTON VICTOR AMIR",
                                "email": "eragmedico@gmail.com",
                                "telefono": "52949085",
                                "nickname": "Eddy rolando Arteaga gomez",
                                "_code": "Gua-307-I8C",
                                "created_at": "2018-06-06 19:50:10",
                                "updated_at": "2018-06-06 19:50:10",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 314,
                                "matricula": "20818",
                                "name": "Roberto Guillermo Chiroy Santos",
                                "email": "robertochsa@yahoo.com",
                                "telefono": "42154513",
                                "nickname": "Robertochsa",
                                "_code": "GUA-166-cvl",
                                "created_at": "2018-06-06 21:01:23",
                                "updated_at": "2018-06-06 21:01:23",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 315,
                                "matricula": "6794",
                                "name": "DE LEON CARDOZA MIGUEL ALEJANDRO",
                                "email": "a7777tan@yahoo.es",
                                "telefono": "40069145",
                                "nickname": "Dr De Leon",
                                "_code": "GUA-999-dhO",
                                "created_at": "2018-06-06 21:01:43",
                                "updated_at": "2018-06-06 21:01:43",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 316,
                                "matricula": "10456",
                                "name": "CASTRO RIVERA ESTEBAN",
                                "email": "drcastrorivera@gmail.com",
                                "telefono": "22827957",
                                "nickname": "Esteban",
                                "_code": "COR-443-S2h",
                                "created_at": "2018-06-06 21:13:06",
                                "updated_at": "2018-06-06 21:13:06",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 317,
                                "matricula": "19476",
                                "name": "Juan Carlos urcuyo Mendoza",
                                "email": "jcurcuyo@gmail.com",
                                "telefono": "54848553",
                                "nickname": "Dr-urcuyo",
                                "_code": "GUA-685-oE7",
                                "created_at": "2018-06-06 21:27:47",
                                "updated_at": "2018-07-07 17:09:15",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 318,
                                "matricula": "7102",
                                "name": "CARRANZA ELIAR DOUGLAS",
                                "email": "douglascarranza@yahoo.com",
                                "telefono": "99611939",
                                "nickname": "Doug",
                                "_code": "HON-694-RZC",
                                "created_at": "2018-06-06 21:35:35",
                                "updated_at": "2018-06-06 21:35:35",
                                "puntos": 25
                            }
                        },
                        {
                            "user": {
                                "id": 319,
                                "matricula": "10061",
                                "name": "PE;A PALMA CARLOS HUMBERTO",
                                "email": "chpslang77@hotmail.com",
                                "telefono": "504 33920033",
                                "nickname": "Carlos",
                                "_code": "Hon-137-jZp",
                                "created_at": "2018-06-06 21:49:57",
                                "updated_at": "2018-06-06 21:49:57",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 320,
                                "matricula": "11834",
                                "name": "Sosa Alejandra Victoria",
                                "email": "vickyasp@gmail.com",
                                "telefono": "87348159",
                                "nickname": "vicky",
                                "_code": "HON-912-aGz",
                                "created_at": "2018-06-06 22:11:42",
                                "updated_at": "2018-06-06 22:11:42",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 321,
                                "matricula": "4570",
                                "name": "PAZZETTI DANIEL",
                                "email": "pazzetti@yahoo.com",
                                "telefono": "99722122",
                                "nickname": "Danny Boy",
                                "_code": "HON-853-3Qs",
                                "created_at": "2018-06-06 22:49:43",
                                "updated_at": "2018-06-06 22:49:43",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 322,
                                "matricula": "7680",
                                "name": "UMAÑA JOSUE",
                                "email": "josueum1@hotmail.com",
                                "telefono": "+50496570632",
                                "nickname": "josueum1",
                                "_code": "HON-172-cJZ",
                                "created_at": "2018-06-07 00:07:47",
                                "updated_at": "2018-06-07 00:07:47",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 323,
                                "matricula": "9161",
                                "name": "RODRIGUEZ NUÑEZ MARIO FRANCISCO",
                                "email": "mfrancisco84@gmail.com",
                                "telefono": "97500602",
                                "nickname": "Mariof",
                                "_code": "HON-374-I12",
                                "created_at": "2018-06-07 00:22:20",
                                "updated_at": "2018-06-07 00:22:20",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 324,
                                "matricula": "13860",
                                "name": "AGUILAR CAMACHO GILDA",
                                "email": "dragildaaguilarcamacho@gmail.com",
                                "telefono": "83167766",
                                "nickname": "Gil",
                                "_code": "COR-680-Zr1",
                                "created_at": "2018-06-07 00:27:50",
                                "updated_at": "2018-06-29 09:19:37",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 325,
                                "matricula": "2245",
                                "name": "Carlos Alberto Diaz Hernandez",
                                "email": "carluca47@gmail.com",
                                "telefono": "83816351",
                                "nickname": "Carlos Alberto",
                                "_code": "COR-581-drY",
                                "created_at": "2018-06-07 00:29:56",
                                "updated_at": "2018-06-07 00:29:56",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 326,
                                "matricula": "32004",
                                "name": "LOPEZ  MICHELL",
                                "email": "amorsotemitchelle@hotmail.com",
                                "telefono": "83917695",
                                "nickname": "Michelle.lopez",
                                "_code": "NIC-425-wEV",
                                "created_at": "2018-06-07 01:08:13",
                                "updated_at": "2018-06-07 01:08:13",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 327,
                                "matricula": "5524",
                                "name": "MURILLO MONTERO LUIS ARMANDO",
                                "email": "luismuri@hotmail.com",
                                "telefono": "32351053",
                                "nickname": "Doctor",
                                "_code": "HON-764-xn3",
                                "created_at": "2018-06-07 01:14:38",
                                "updated_at": "2018-06-07 01:14:38",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 328,
                                "matricula": "12947",
                                "name": "ORTIZ VARGAS CESAR AUGUSTO",
                                "email": "cesarortizvargas@hotmail.com",
                                "telefono": "31962597",
                                "nickname": "Checha",
                                "_code": "GUA-579-u7q",
                                "created_at": "2018-06-07 01:34:18",
                                "updated_at": "2018-06-14 20:33:42",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 329,
                                "matricula": "14007",
                                "name": "Juan Luis Reyes Robles",
                                "email": "juanlreyesrobles@hotmail.com",
                                "telefono": "95164872",
                                "nickname": "juancho",
                                "_code": "HON-483-xX4",
                                "created_at": "2018-06-07 01:45:10",
                                "updated_at": "2018-06-07 01:45:10",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 330,
                                "matricula": "3952",
                                "name": "Ingram De León Marlon",
                                "email": "marjoin@hotmail.com",
                                "telefono": "83871877",
                                "nickname": "marjoin",
                                "_code": "COR-169-Gg8",
                                "created_at": "2018-06-07 01:45:41",
                                "updated_at": "2018-07-09 21:26:20",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 331,
                                "matricula": "14667",
                                "name": "LEMUS LEIVA MARIO ARNOLDO",
                                "email": "mariolemusleiva@hotmail.com",
                                "telefono": "71920326",
                                "nickname": "MarioLeiva",
                                "_code": "SAL-751-jR7",
                                "created_at": "2018-06-07 02:02:29",
                                "updated_at": "2018-06-07 02:02:29",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 332,
                                "matricula": "18774",
                                "name": "Gibber oxlaj",
                                "email": "gibber180g@hotmail.com",
                                "telefono": "58656781",
                                "nickname": "Gibo",
                                "_code": "GUA-201-NUm",
                                "created_at": "2018-06-07 02:12:07",
                                "updated_at": "2018-06-07 02:12:07",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 333,
                                "matricula": "4846",
                                "name": "ROVELO BUSTILLO MAURICIO ALEJANDRO",
                                "email": "paer30hn@hotmail.com",
                                "telefono": "99989686",
                                "nickname": "rovelo",
                                "_code": "HON-308-Ci4",
                                "created_at": "2018-06-07 02:19:50",
                                "updated_at": "2018-06-07 02:19:50",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 334,
                                "matricula": "17291",
                                "name": "Walfre Ediberto García García",
                                "email": "walisgar@hotmail.com",
                                "telefono": "55998107",
                                "nickname": "walfre",
                                "_code": "GUA-667-OYb",
                                "created_at": "2018-06-07 02:32:19",
                                "updated_at": "2018-06-07 02:32:19",
                                "puntos": 123
                            }
                        },
                        {
                            "user": {
                                "id": 335,
                                "matricula": "2228",
                                "name": "ARGUEDAS MARTINEZ WALTER",
                                "email": "wago2306@yahoo.es",
                                "telefono": "22320930",
                                "nickname": "wal",
                                "_code": "COR-696-xn4",
                                "created_at": "2018-06-07 02:35:03",
                                "updated_at": "2018-06-07 02:35:03",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 336,
                                "matricula": "4186",
                                "name": "CASTRO CHAVEZ FULGENCIO ISRAEL",
                                "email": "israelcastrochavez@gmail.com",
                                "telefono": "59223597",
                                "nickname": "israel",
                                "_code": "GUA-475-Pq4",
                                "created_at": "2018-06-07 03:30:12",
                                "updated_at": "2018-06-07 03:30:12",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 337,
                                "matricula": "9687",
                                "name": "PORRES ERWIN ESTUARDO",
                                "email": "alexporres321@gmail.com",
                                "telefono": "56459904",
                                "nickname": "Erwin.p.",
                                "_code": "GUA-160-KFH",
                                "created_at": "2018-06-07 03:33:02",
                                "updated_at": "2018-06-07 03:33:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 338,
                                "matricula": "8808",
                                "name": "REYES PADILLA ROQUE ALBERTO",
                                "email": "roquereyes@hotmail.com",
                                "telefono": "98445906",
                                "nickname": "Roque",
                                "_code": "HON-927-Lna",
                                "created_at": "2018-06-07 04:02:10",
                                "updated_at": "2018-06-07 04:02:10",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 339,
                                "matricula": "8477",
                                "name": "HERNANDEZ LOPEZ ALVARO ISRAEL",
                                "email": "clemanuel@hotmail.com",
                                "telefono": "40400482",
                                "nickname": "Docalvaro",
                                "_code": "GUA-673-voJ",
                                "created_at": "2018-06-07 04:21:52",
                                "updated_at": "2018-06-07 04:21:52",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 340,
                                "matricula": "19461",
                                "name": "ESTRDADA y   ESTRDA   JULIO  CESAR",
                                "email": "estradayestrada1@gmail.com",
                                "telefono": "54516816",
                                "nickname": "Julito",
                                "_code": "GUA-486-wxu",
                                "created_at": "2018-06-07 04:23:51",
                                "updated_at": "2018-06-09 03:19:48",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 341,
                                "matricula": "10275",
                                "name": "AGUILERA ORTEZ ERICK ALFONSO",
                                "email": "kcire238_2@hotmail.com",
                                "telefono": "96811673",
                                "nickname": "Gabino",
                                "_code": "HON-948-sc4",
                                "created_at": "2018-06-07 04:40:20",
                                "updated_at": "2018-06-07 04:40:20",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 342,
                                "matricula": "14508",
                                "name": "PATRICIA MONGE CASTRO",
                                "email": "pat.monge@hotmail.com",
                                "telefono": "84144766",
                                "nickname": "pat.monge@hotmail.com",
                                "_code": "COR-471-DLn",
                                "created_at": "2018-06-07 04:49:12",
                                "updated_at": "2018-06-13 18:24:10",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 343,
                                "matricula": "11344",
                                "name": "Kristel Salas Castillo",
                                "email": "krisac_33@hotmail.com",
                                "telefono": "89837997",
                                "nickname": "KlistenS",
                                "_code": "COR-372-IYN",
                                "created_at": "2018-06-07 04:49:23",
                                "updated_at": "2018-06-07 04:49:23",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 344,
                                "matricula": "8.37",
                                "name": "Milton Figueroa Villeda",
                                "email": "docmfv@hotmail.es",
                                "telefono": "56903469",
                                "nickname": "midoc",
                                "_code": "GUA-502-e9A",
                                "created_at": "2018-06-07 05:07:22",
                                "updated_at": "2018-06-07 05:07:22",
                                "puntos": 138
                            }
                        },
                        {
                            "user": {
                                "id": 345,
                                "matricula": "8180",
                                "name": "MANZANARES PINNOT DOUGLAS FRANCISCO",
                                "email": "douglaspinoth@yahoo.com.mx",
                                "telefono": "33417147",
                                "nickname": "Douglas Manzanares",
                                "_code": "HON-620-Ayy",
                                "created_at": "2018-06-07 05:12:23",
                                "updated_at": "2018-06-07 05:12:23",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 346,
                                "matricula": "13429",
                                "name": "ROMERO FLAMENCO NANCY LISSETTE",
                                "email": "nancyfl1976@gmail.com",
                                "telefono": "79185076",
                                "nickname": "Lyz",
                                "_code": "SAL-412-sGE",
                                "created_at": "2018-06-07 05:35:38",
                                "updated_at": "2018-06-07 05:35:38",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 347,
                                "matricula": "15693",
                                "name": "Edwin Stanly Escobar Pineda",
                                "email": "stanlypelusa@hotmail.com",
                                "telefono": "42826708",
                                "nickname": "Neurostanly",
                                "_code": "GUA-060-wt2",
                                "created_at": "2018-06-07 05:36:48",
                                "updated_at": "2018-06-07 05:36:48",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 348,
                                "matricula": "7359",
                                "name": "AVENDAÑO HERNANDEZ JOSUE",
                                "email": "drjosavengeria@gmail.com",
                                "telefono": "50257088128",
                                "nickname": "JR",
                                "_code": "GUA-283-4Xp",
                                "created_at": "2018-06-07 05:41:36",
                                "updated_at": "2018-06-07 05:41:36",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 349,
                                "matricula": "3486",
                                "name": "MENDIZABAL MAZARIEGOS  JULIO RAFAEL",
                                "email": "chino_mendizabal@hotmail.com",
                                "telefono": "42159600",
                                "nickname": "chino",
                                "_code": "GUA-975-epk",
                                "created_at": "2018-06-07 05:48:24",
                                "updated_at": "2018-06-07 05:48:24",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 350,
                                "matricula": "4244",
                                "name": "TOME ZELAYA ENRIQUE",
                                "email": "enriquetome@yahoo.com",
                                "telefono": "94660571",
                                "nickname": "ELDOCTOME",
                                "_code": "HON-354-aLY",
                                "created_at": "2018-06-07 05:52:08",
                                "updated_at": "2018-06-07 05:52:08",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 351,
                                "matricula": "8371",
                                "name": "Pablo Gamboa Ureña",
                                "email": "pgamboau@gmail.com",
                                "telefono": "88327732",
                                "nickname": "Carisma",
                                "_code": "COR-683-gEh",
                                "created_at": "2018-06-07 06:15:12",
                                "updated_at": "2018-06-07 06:15:12",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 352,
                                "matricula": "10389",
                                "name": "CRUZ MARTINEZ ALBA LUCILA",
                                "email": "lucy3186@gmaul.com",
                                "telefono": "97489785",
                                "nickname": "Lucy",
                                "_code": "HON-525-ZfM",
                                "created_at": "2018-06-07 06:15:15",
                                "updated_at": "2018-06-07 06:15:15",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 353,
                                "matricula": "8408",
                                "name": "UMANZOR VELÁSQUEZ FRANCIA MARÍA",
                                "email": "franciaumanzor@ymail.com",
                                "telefono": "99729835",
                                "nickname": "Frenchyvel",
                                "_code": "HON-797-gne",
                                "created_at": "2018-06-07 06:19:49",
                                "updated_at": "2018-07-05 22:40:45",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 354,
                                "matricula": "18938",
                                "name": "GALAN PEREZ JOSHUA",
                                "email": "joshua_galan84@yahoo.com.mx",
                                "telefono": "45955555",
                                "nickname": "galan",
                                "_code": "GUA-134-tsk",
                                "created_at": "2018-06-07 06:52:03",
                                "updated_at": "2018-06-07 06:52:03",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 355,
                                "matricula": "59928636",
                                "name": "Rolando Guerra",
                                "email": "drrolguerra@hotmail.com",
                                "telefono": "52063988",
                                "nickname": "Rolan",
                                "_code": "GUA-953-g1M",
                                "created_at": "2018-06-07 06:54:24",
                                "updated_at": "2018-06-07 06:54:24",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 356,
                                "matricula": "17962",
                                "name": "Beatriz del Rosario Mendoza López",
                                "email": "beatrizdlrosario@gmail.com",
                                "telefono": "50179895",
                                "nickname": "BeaMendoza",
                                "_code": "GUA-929-Ilv",
                                "created_at": "2018-06-07 07:21:01",
                                "updated_at": "2018-06-15 20:48:34",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 357,
                                "matricula": "1018",
                                "name": "ALVARADO LIMA FRANCISCO",
                                "email": "fralima01@gmail.com",
                                "telefono": "77616883",
                                "nickname": "Francisco",
                                "_code": "GUA-080-JsA",
                                "created_at": "2018-06-07 07:22:28",
                                "updated_at": "2018-06-07 07:22:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 358,
                                "matricula": "6883",
                                "name": "Manuel de Jesús Diaz",
                                "email": "mbastiandiaz2005@yahoo.com",
                                "telefono": "54014603",
                                "nickname": "Manuel",
                                "_code": "GUA-053-2xi",
                                "created_at": "2018-06-07 07:31:21",
                                "updated_at": "2018-06-07 07:31:21",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 359,
                                "matricula": "4321",
                                "name": "HIDALGO CORRALES MARIA ISABEL",
                                "email": "giancahwu@hotmail.com",
                                "telefono": "88713232",
                                "nickname": "Isa",
                                "_code": "cor-831-l7x",
                                "created_at": "2018-06-07 07:52:40",
                                "updated_at": "2018-06-07 07:52:40",
                                "puntos": 121
                            }
                        },
                        {
                            "user": {
                                "id": 360,
                                "matricula": "2964",
                                "name": "ALVARO ROLANDO PERDOMO JIMENEZ",
                                "email": "dralvaroperdomo@gmail.com",
                                "telefono": "58349667",
                                "nickname": "Alrpcool",
                                "_code": "GUA-620-8IB",
                                "created_at": "2018-06-07 08:13:40",
                                "updated_at": "2018-06-07 08:13:40",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 361,
                                "matricula": "2808913378",
                                "name": "Jorge Alberto Malavert Tabora",
                                "email": "jorgemalavert5@gmail.com",
                                "telefono": "504-89138222",
                                "nickname": "george",
                                "_code": "HON-931-FhO",
                                "created_at": "2018-06-07 08:13:58",
                                "updated_at": "2018-06-07 08:13:58",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 362,
                                "matricula": "14989",
                                "name": "CASTILLO RAMIEZ OSCAR ALEXANDER",
                                "email": "castle181@hotmail.com",
                                "telefono": "503 7118 9460",
                                "nickname": "Castle181",
                                "_code": "SAL-553-G8V",
                                "created_at": "2018-06-07 08:23:23",
                                "updated_at": "2018-06-07 08:23:23",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 363,
                                "matricula": "1266",
                                "name": "JORGE ALBERTO ALARCÓN LEMUS",
                                "email": "kokiala@hotmail.com",
                                "telefono": "71403761",
                                "nickname": "kokiala",
                                "_code": "SAL-162-Y2B",
                                "created_at": "2018-06-07 09:00:28",
                                "updated_at": "2018-06-07 09:00:28",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 364,
                                "matricula": "14981",
                                "name": "CHEW FLORIA DENIS",
                                "email": "denischew8@gmail.com",
                                "telefono": "42753047",
                                "nickname": "denischew",
                                "_code": "GUA-186-8Hw",
                                "created_at": "2018-06-07 11:22:36",
                                "updated_at": "2018-06-07 11:22:36",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 365,
                                "matricula": "8185",
                                "name": "DISCUA DUARTE SOFIA CECILIA",
                                "email": "scdd26@hotmail.com",
                                "telefono": "96908438",
                                "nickname": "Aifos",
                                "_code": "HON-456-jkm",
                                "created_at": "2018-06-07 17:55:44",
                                "updated_at": "2018-06-14 06:06:24",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 366,
                                "matricula": "10522",
                                "name": "PEREZ ARRIVILLAGA MARIA GABRIELA",
                                "email": "gabygoches@gmail.com",
                                "telefono": "(502) 5319-2134",
                                "nickname": "Gabygoches",
                                "_code": "GUA-140-2ar",
                                "created_at": "2018-06-07 18:03:38",
                                "updated_at": "2018-06-07 18:03:38",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 367,
                                "matricula": "7341",
                                "name": "RAMIREZ LOPEZ CESAR FRANCISCO",
                                "email": "dr.c_ramirez@hotmail.com",
                                "telefono": "41509472",
                                "nickname": "DRamirez",
                                "_code": "GUA-448-VsV",
                                "created_at": "2018-06-07 18:26:03",
                                "updated_at": "2018-06-07 18:26:03",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 368,
                                "matricula": "5324",
                                "name": "PAZ BEZNER",
                                "email": "beznerpaz@yahoo.com",
                                "telefono": "25278004",
                                "nickname": "Bezner Paz",
                                "_code": "HON-286-1ii",
                                "created_at": "2018-06-07 18:27:43",
                                "updated_at": "2018-06-07 18:27:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 369,
                                "matricula": "5252",
                                "name": "HIDALGO JARA MAX",
                                "email": "maxhidalgo@hotmail.es",
                                "telefono": "87071908",
                                "nickname": "jedi72",
                                "_code": "COR-937-h9T",
                                "created_at": "2018-06-07 18:38:48",
                                "updated_at": "2018-06-07 18:38:48",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 370,
                                "matricula": "9013",
                                "name": "FLORES CARRANZA ADA ESTHER",
                                "email": "adaflorescarranza@yahoo.es",
                                "telefono": "71298612",
                                "nickname": "Adaflores",
                                "_code": "SAL-340-bz3",
                                "created_at": "2018-06-07 18:41:52",
                                "updated_at": "2018-06-07 18:41:52",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 371,
                                "matricula": "10302",
                                "name": "Luis Alonso Madriz Montero",
                                "email": "lmadrizmontero@gmail.com",
                                "telefono": "22533689",
                                "nickname": "luigimadriz",
                                "_code": "COR-481-B7Q",
                                "created_at": "2018-06-07 19:16:48",
                                "updated_at": "2018-06-07 19:16:48",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 372,
                                "matricula": "9163",
                                "name": "GALDAMEZ AVALOS CESAR ANTONIO",
                                "email": "dr.galdamez@ugb.edu.sv",
                                "telefono": "2608-2193",
                                "nickname": "cesar",
                                "_code": "SAL-084-HUk",
                                "created_at": "2018-06-07 19:20:59",
                                "updated_at": "2018-06-07 19:20:59",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 373,
                                "matricula": "8811",
                                "name": "BÁMACA PÉREZ ENDER OSWALDO",
                                "email": "drender_2006@hotmail.com",
                                "telefono": "55182785",
                                "nickname": "Ender",
                                "_code": "GUA-206-RQX",
                                "created_at": "2018-06-07 19:34:20",
                                "updated_at": "2018-06-07 19:34:20",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 374,
                                "matricula": "12385",
                                "name": "ESPAÑA DE GONZÁLEZ RUTH ELIZABETH",
                                "email": "ajgf_09@hotmail.com",
                                "telefono": "76833826",
                                "nickname": "elizspn",
                                "_code": "SAL-240-yJo",
                                "created_at": "2018-06-07 20:10:14",
                                "updated_at": "2018-06-07 20:10:14",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 375,
                                "matricula": "19257",
                                "name": "HUINAC GOMEZ SANTOS DEMETRIO",
                                "email": "dehuimez15@gmail.com",
                                "telefono": "44535338",
                                "nickname": "Demetrio",
                                "_code": "GUA-021-bVq",
                                "created_at": "2018-06-07 20:56:13",
                                "updated_at": "2018-06-07 20:56:13",
                                "puntos": 49
                            }
                        },
                        {
                            "user": {
                                "id": 376,
                                "matricula": "16676",
                                "name": "Fredy Giovanni Barillas",
                                "email": "fre_bv@hotmail.com",
                                "telefono": "57156590",
                                "nickname": "fgiov",
                                "_code": "GUA-695-me6",
                                "created_at": "2018-06-07 21:37:17",
                                "updated_at": "2018-06-07 21:37:17",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 377,
                                "matricula": "2884",
                                "name": "GARCIA CAÑAS RAUL OSWALDO",
                                "email": "raul_canas@hotmail.com",
                                "telefono": "7853-2291",
                                "nickname": "RAUL CAÑAS",
                                "_code": "SAL-615-rjs",
                                "created_at": "2018-06-07 21:53:31",
                                "updated_at": "2018-06-07 21:53:31",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 378,
                                "matricula": "13511",
                                "name": "Julio Manuel Fuentes Escobar",
                                "email": "juliomanuelfuentes@gmail.com",
                                "telefono": "50182423",
                                "nickname": "Dr,JUFU",
                                "_code": "GUA-207-UOh",
                                "created_at": "2018-06-07 22:18:25",
                                "updated_at": "2018-06-07 22:18:25",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 379,
                                "matricula": "503149474",
                                "name": "Claudia Elizabeth Mendoza Hernández",
                                "email": "eli_mendoza2006@yahoo.com",
                                "telefono": "+504 89859195",
                                "nickname": "Eli",
                                "_code": "HON-206-Smp",
                                "created_at": "2018-06-07 22:19:00",
                                "updated_at": "2018-06-07 22:19:00",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 380,
                                "matricula": "10930",
                                "name": "Ibeth Geraldlina Martinez Martinez",
                                "email": "martinezdeco88@gmail.com",
                                "telefono": "31400452",
                                "nickname": "ibeth",
                                "_code": "HON-067-R3D",
                                "created_at": "2018-06-07 22:44:11",
                                "updated_at": "2018-06-07 22:44:11",
                                "puntos": 40
                            }
                        },
                        {
                            "user": {
                                "id": 381,
                                "matricula": "5962",
                                "name": "Heber Aristides Flores Portillo",
                                "email": "dr.heberaristidesflores@hotmail.com",
                                "telefono": "77361322",
                                "nickname": "Heber",
                                "_code": "SAL-465-PhB",
                                "created_at": "2018-06-07 23:29:09",
                                "updated_at": "2018-06-08 01:53:51",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 382,
                                "matricula": "11280",
                                "name": "ORELLANA JOSÉ ROBERTO",
                                "email": "caralan2002@hotmail.com",
                                "telefono": "71604833",
                                "nickname": "Robert76",
                                "_code": "Sal-116-rs5",
                                "created_at": "2018-06-07 23:35:05",
                                "updated_at": "2018-06-07 23:35:05",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 383,
                                "matricula": "8950",
                                "name": "Jorge Danilo Figueroa Jiménez",
                                "email": "danytacuchito@hotmail.com",
                                "telefono": "42178417",
                                "nickname": "Danilo",
                                "_code": "GUA-455-O9h",
                                "created_at": "2018-06-08 00:32:46",
                                "updated_at": "2018-06-08 00:32:46",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 384,
                                "matricula": "13533",
                                "name": "DOUGLAS GUTIERREZ",
                                "email": "duguty@gmail.com",
                                "telefono": "83332531",
                                "nickname": "duguty",
                                "_code": "COR-936-C3A",
                                "created_at": "2018-06-08 01:02:58",
                                "updated_at": "2018-06-08 01:02:58",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 385,
                                "matricula": "543",
                                "name": "Jorge Alberto Guillen Calix",
                                "email": "belia1738@yahoo.com",
                                "telefono": "25513758",
                                "nickname": "Jorge",
                                "_code": "HON-692-PhI",
                                "created_at": "2018-06-08 01:26:15",
                                "updated_at": "2018-06-30 03:35:02",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 386,
                                "matricula": "11594",
                                "name": "Guillermo Herrera",
                                "email": "clinicapinula2018@gmail.com",
                                "telefono": "47103173",
                                "nickname": "Gmoherrera",
                                "_code": "GUA-189-MhW",
                                "created_at": "2018-06-08 01:47:17",
                                "updated_at": "2018-06-08 01:47:17",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 387,
                                "matricula": "411534",
                                "name": "Heidy ortiz",
                                "email": "cirujanaheidy1977@gmail.com",
                                "telefono": "59798511",
                                "nickname": "doctora",
                                "_code": "GUA-216-PzW",
                                "created_at": "2018-06-08 02:05:24",
                                "updated_at": "2018-06-08 02:05:24",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 388,
                                "matricula": "7905",
                                "name": "TROCHEZ WONG CARLOS LUIS",
                                "email": "carloswong11@hotmail.com",
                                "telefono": "50487790191",
                                "nickname": "charlie",
                                "_code": "HON-503-ASt",
                                "created_at": "2018-06-08 02:44:23",
                                "updated_at": "2018-06-08 02:44:23",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 389,
                                "matricula": "10820",
                                "name": "FONSECA HAUG ARTURO",
                                "email": "arturofonsecah@hotmail.com",
                                "telefono": "60502060",
                                "nickname": "Arturo Fonseca",
                                "_code": "COR-974-Mto",
                                "created_at": "2018-06-08 03:00:46",
                                "updated_at": "2018-06-08 03:00:46",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 390,
                                "matricula": "1109",
                                "name": "Carlos Banegas",
                                "email": "rene.atilanobanegas@gmail.com",
                                "telefono": "+89291335",
                                "nickname": "Rene",
                                "_code": "HON-245-XDh",
                                "created_at": "2018-06-08 03:42:13",
                                "updated_at": "2018-06-08 03:42:13",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 391,
                                "matricula": "6231",
                                "name": "SUBUYUJ ALVAREZ CARLOS ARMANDO",
                                "email": "lc.subuyuj@gmail.com",
                                "telefono": "52032164",
                                "nickname": "Dr.Csubuyuj",
                                "_code": "GUA-159-Wza",
                                "created_at": "2018-06-08 03:58:13",
                                "updated_at": "2018-06-08 03:58:13",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 392,
                                "matricula": "112512",
                                "name": "Ronny Daniel Zavala Medina",
                                "email": "danielronny19@gmail.com",
                                "telefono": "32771083",
                                "nickname": "Dan",
                                "_code": "Hon-154-1sY",
                                "created_at": "2018-06-08 04:09:18",
                                "updated_at": "2018-06-14 20:08:01",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 393,
                                "matricula": "12598",
                                "name": "MIJANGOS MARTINEZ LILIAN JEANNETTE",
                                "email": "lilianjmijangos@hotmail.com",
                                "telefono": "42157102",
                                "nickname": "LilianMija",
                                "_code": "GUA-917-l4e",
                                "created_at": "2018-06-08 05:26:40",
                                "updated_at": "2018-06-08 05:26:40",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 394,
                                "matricula": "3857",
                                "name": "VILLATORO HERNANDEZ JULIO ENRIQUE",
                                "email": "julio.villatoro@hotmail.com",
                                "telefono": "56161223",
                                "nickname": "Julio Villatoro",
                                "_code": "GUA-233-vri",
                                "created_at": "2018-06-08 05:27:50",
                                "updated_at": "2018-06-08 05:27:50",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 395,
                                "matricula": "10011",
                                "name": "VILLEDA HERNANDEZ ROXANA CAROLINA",
                                "email": "fjpvtico@gmail.com",
                                "telefono": "77003840",
                                "nickname": "Rox",
                                "_code": "SAL-133-tGW",
                                "created_at": "2018-06-08 05:33:04",
                                "updated_at": "2018-06-08 05:33:04",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 396,
                                "matricula": "9175",
                                "name": "SANTOS CONTRERAS CARLOS ALFREDO",
                                "email": "drcarlossantos@yahoo.com.mx",
                                "telefono": "54142166",
                                "nickname": "CARLOS SANTOS",
                                "_code": "GUA-622-6Za",
                                "created_at": "2018-06-08 06:04:06",
                                "updated_at": "2018-06-08 06:04:06",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 397,
                                "matricula": "5073",
                                "name": "FERRERA RUIZ FREDY ORLANDO",
                                "email": "ferrerafredy@yahoo.es",
                                "telefono": "95863405",
                                "nickname": "Fredy",
                                "_code": "HON-646-cKH",
                                "created_at": "2018-06-08 06:13:37",
                                "updated_at": "2018-06-08 06:13:37",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 398,
                                "matricula": "12200",
                                "name": "SIMON FRANCISCO NICOLAS",
                                "email": "sychicoinye@gmail.com",
                                "telefono": "502-55276876",
                                "nickname": "Drsymon",
                                "_code": "GUA-316-u1D",
                                "created_at": "2018-06-08 06:17:59",
                                "updated_at": "2018-07-05 03:03:48",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 399,
                                "matricula": "2201",
                                "name": "LEAL FLORES LUIS ENRIQUE",
                                "email": "luisenrilealf@hotmail.es",
                                "telefono": "54212825",
                                "nickname": "pomponio",
                                "_code": "GUA-530-ygZ",
                                "created_at": "2018-06-08 06:38:18",
                                "updated_at": "2018-06-08 06:38:18",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 400,
                                "matricula": "2201",
                                "name": "LEAL FLORES LUIS ENRIQUE",
                                "email": "lealflouis@hotmail.com",
                                "telefono": "54212825",
                                "nickname": "luis",
                                "_code": "GUA-416-Ske",
                                "created_at": "2018-06-08 06:47:34",
                                "updated_at": "2018-06-08 06:47:34",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 401,
                                "matricula": "1499",
                                "name": "Carlos Felipe Ponce Orellana",
                                "email": "zonechar@gmail.com",
                                "telefono": "47456789",
                                "nickname": "CFPONCE",
                                "_code": "GUA-921-m2x",
                                "created_at": "2018-06-08 07:17:28",
                                "updated_at": "2018-06-08 07:17:28",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 402,
                                "matricula": "19611",
                                "name": "SAGASTUME BAUTISTA INGRID ARACELY",
                                "email": "ingridsagastume2001@gmail.com",
                                "telefono": "47701322",
                                "nickname": "Isagastume",
                                "_code": "GUA-454-K27",
                                "created_at": "2018-06-08 07:32:03",
                                "updated_at": "2018-06-08 07:32:03",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 403,
                                "matricula": "6478",
                                "name": "HERNANDEZ DE LEON DE AQUINO DORA ESTELA",
                                "email": "estelaquiz@gmail.com",
                                "telefono": "55102683",
                                "nickname": "estelaquiz@gmail.com",
                                "_code": "GUA-911-9WU",
                                "created_at": "2018-06-08 07:55:08",
                                "updated_at": "2018-06-14 07:09:35",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 404,
                                "matricula": "12068",
                                "name": "CAMPOS, FLOR DE MARIA",
                                "email": "florcampos76@hotmail.com",
                                "telefono": "57091525",
                                "nickname": "flor",
                                "_code": "GUA-605-2iW",
                                "created_at": "2018-06-08 18:57:07",
                                "updated_at": "2018-06-08 18:57:07",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 405,
                                "matricula": "17264",
                                "name": "Ana del Carmen Buonafina Zea",
                                "email": "buonafina.ana@gmail.com",
                                "telefono": "34537709",
                                "nickname": "Buonafina.ana",
                                "_code": "GUA-212-PL1",
                                "created_at": "2018-06-08 19:07:12",
                                "updated_at": "2018-06-08 19:07:12",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 406,
                                "matricula": "6562018",
                                "name": "Ronald Argueta",
                                "email": "dr.arguetamejia@yahoo.com",
                                "telefono": "70950799",
                                "nickname": "NeuRoNo",
                                "_code": "SAL-730-Mu5",
                                "created_at": "2018-06-08 19:24:02",
                                "updated_at": "2018-06-08 19:24:02",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 407,
                                "matricula": "5759",
                                "name": "ESTRADA DUBON ERICK JOSE",
                                "email": "elmedicoensucasa@gmail.com",
                                "telefono": "502-55168634",
                                "nickname": "Poncharelo",
                                "_code": "GUA-263-TZC",
                                "created_at": "2018-06-08 20:45:27",
                                "updated_at": "2018-06-08 20:45:27",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 408,
                                "matricula": "3836",
                                "name": "Roberto Estrada Rosales",
                                "email": "robesro@yahoo.com",
                                "telefono": "7872-2316  7872-4327",
                                "nickname": "--",
                                "_code": "GUA-026-dnN",
                                "created_at": "2018-06-08 21:19:37",
                                "updated_at": "2018-06-08 21:19:37",
                                "puntos": 52
                            }
                        },
                        {
                            "user": {
                                "id": 409,
                                "matricula": "8097",
                                "name": "SABORIO PORRAS VANESSA",
                                "email": "vsaborior@hotmail.com",
                                "telefono": "83288206",
                                "nickname": "vanessa",
                                "_code": "COR-060-28r",
                                "created_at": "2018-06-08 21:53:37",
                                "updated_at": "2018-06-08 21:53:37",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 410,
                                "matricula": "6329",
                                "name": "Sammy Alexis Ramirez Juarez",
                                "email": "sammana90@gmail.com",
                                "telefono": "55182770",
                                "nickname": "Guaca",
                                "_code": "GUA-316-keW",
                                "created_at": "2018-06-08 22:05:03",
                                "updated_at": "2018-06-08 22:05:03",
                                "puntos": 39
                            }
                        },
                        {
                            "user": {
                                "id": 411,
                                "matricula": "10015",
                                "name": "PEREZ CARRANZA MILVIA MARIBEL",
                                "email": "ronyjosue96@gmail.com",
                                "telefono": "58117843",
                                "nickname": "DOC.MILVIA",
                                "_code": "GUA-657-IDt",
                                "created_at": "2018-06-08 23:04:03",
                                "updated_at": "2018-06-09 01:21:35",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 412,
                                "matricula": "12623",
                                "name": "Nancy Yadira Cruz",
                                "email": "nancyc1289@gmail.com",
                                "telefono": "31712161",
                                "nickname": "NYC89",
                                "_code": "HON-952-z9S",
                                "created_at": "2018-06-08 23:24:51",
                                "updated_at": "2018-06-08 23:24:51",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 413,
                                "matricula": "6697",
                                "name": "Gil azurdia victor hugo",
                                "email": "hospitalcolon@yahoo.com",
                                "telefono": "50168199",
                                "nickname": "Mateo",
                                "_code": "GUA-457-hVl",
                                "created_at": "2018-06-08 23:29:35",
                                "updated_at": "2018-07-10 03:46:29",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 414,
                                "matricula": "7051",
                                "name": "MENDOZA GALVEZ MARIO SALVADOR",
                                "email": "marios.mendoza@gmail.com",
                                "telefono": "40217113",
                                "nickname": "Pinula",
                                "_code": "GUA-267-TAy",
                                "created_at": "2018-06-08 23:29:51",
                                "updated_at": "2018-06-08 23:29:51",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 415,
                                "matricula": "10955",
                                "name": "CERRATO RODAS SARAHY ARACELY",
                                "email": "dra.cerrato59@gmail.com",
                                "telefono": "98636136",
                                "nickname": "Sarahy Cerrato",
                                "_code": "HON-441-lmY",
                                "created_at": "2018-06-08 23:33:58",
                                "updated_at": "2018-06-08 23:33:58",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 416,
                                "matricula": "2100979",
                                "name": "PEÑA BERLIOZ ABDUL GUSTAVO",
                                "email": "abdulgpb@gmail.com",
                                "telefono": "31470247",
                                "nickname": "Tavo",
                                "_code": "HON-643-iSK",
                                "created_at": "2018-06-08 23:47:34",
                                "updated_at": "2018-06-08 23:47:34",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 417,
                                "matricula": "1018",
                                "name": "ANDINO CRUZ RICARDO",
                                "email": "rican.cruz1951@gmail.com",
                                "telefono": "99919329",
                                "nickname": "Ricardo Andino",
                                "_code": "HON-106-5kj",
                                "created_at": "2018-06-09 00:06:29",
                                "updated_at": "2018-06-09 00:06:29",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 418,
                                "matricula": "3345",
                                "name": "RODRIGUEZ GRAMAJO JUAN ALBERTO",
                                "email": "betoche_10@hotmail.com",
                                "telefono": "56945316",
                                "nickname": "MR.FLOGS",
                                "_code": "GUA-141-NHA",
                                "created_at": "2018-06-09 00:27:26",
                                "updated_at": "2018-06-09 00:27:26",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 419,
                                "matricula": "10929",
                                "name": "LEAL GUERRA ERNY",
                                "email": "ernyleguerra@yahoo.com",
                                "telefono": "50061014",
                                "nickname": "Erny",
                                "_code": "GUA-064-S2K",
                                "created_at": "2018-06-09 00:45:02",
                                "updated_at": "2018-06-09 00:45:02",
                                "puntos": 62
                            }
                        },
                        {
                            "user": {
                                "id": 420,
                                "matricula": "8719",
                                "name": "Diaz Chavarria Humberto",
                                "email": "drdiaz8719@yahoo.com",
                                "telefono": "8836-6670",
                                "nickname": "DRDIAZ",
                                "_code": "COR-055-QHJ",
                                "created_at": "2018-06-09 00:45:22",
                                "updated_at": "2018-06-09 00:45:22",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 421,
                                "matricula": "4299",
                                "name": "FUENTES GONZALEZ CARLOS ROBERTO",
                                "email": "robertof1352@gmail.com",
                                "telefono": "59313388",
                                "nickname": "Robert",
                                "_code": "GUA-830-5gm",
                                "created_at": "2018-06-09 01:08:37",
                                "updated_at": "2018-06-09 01:08:37",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 422,
                                "matricula": "2678",
                                "name": "CASTILLO JORGE HUMBERTO",
                                "email": "jorgehcastillo53@hotmail.com",
                                "telefono": "55136448",
                                "nickname": "JORCAS",
                                "_code": "GUA-102-WQb",
                                "created_at": "2018-06-09 01:29:54",
                                "updated_at": "2018-06-09 01:29:54",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 423,
                                "matricula": "4009",
                                "name": "Reynaldo",
                                "email": "reynolasco65@gmail.com",
                                "telefono": "89570751",
                                "nickname": "Rey65",
                                "_code": "HON-523-4Ce",
                                "created_at": "2018-06-09 01:42:34",
                                "updated_at": "2018-06-09 01:42:34",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 424,
                                "matricula": "14022",
                                "name": "Rolando Cabrera",
                                "email": "rolando10@gmail.com",
                                "telefono": "7165-2182",
                                "nickname": "Doc",
                                "_code": "SAL-722-7k6",
                                "created_at": "2018-06-09 01:42:37",
                                "updated_at": "2018-06-09 01:42:37",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 425,
                                "matricula": "11923",
                                "name": "AGUILAR PERDOMO ALLAN",
                                "email": "esauperdomo@yahoo.es",
                                "telefono": "32558052",
                                "nickname": "allan",
                                "_code": "HON-806-Mri",
                                "created_at": "2018-06-09 01:45:58",
                                "updated_at": "2018-06-22 01:50:04",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 426,
                                "matricula": "7170",
                                "name": "ERAZO DE HERNANDEZ EDITH ERNESTINA",
                                "email": "edithh2007@gmail.com",
                                "telefono": "71539852",
                                "nickname": "edithh2007",
                                "_code": "SAL-881-sME",
                                "created_at": "2018-06-09 02:09:07",
                                "updated_at": "2018-06-09 02:09:07",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 427,
                                "matricula": "19897",
                                "name": "SOLORZANO PINEDA KARLA MARIELVY",
                                "email": "karlamary89@gmail.com",
                                "telefono": "57802282",
                                "nickname": "Karlita",
                                "_code": "GUA-255-d8e",
                                "created_at": "2018-06-09 02:10:24",
                                "updated_at": "2018-06-09 02:10:24",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 428,
                                "matricula": "17997",
                                "name": "Carlos Orlando Caceres Navas",
                                "email": "carlosdr.caceres@gmail.com",
                                "telefono": "61290464",
                                "nickname": "Drcarlitos",
                                "_code": "SAL-783-Yxd",
                                "created_at": "2018-06-09 02:36:54",
                                "updated_at": "2018-06-16 09:54:02",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 429,
                                "matricula": "4083",
                                "name": "Hector Ovidio Diaz Rodriguez",
                                "email": "drovidiodiaz@gmail.com",
                                "telefono": "99147795",
                                "nickname": "ovidio",
                                "_code": "HON-363-XYE",
                                "created_at": "2018-06-09 02:45:26",
                                "updated_at": "2018-06-09 02:45:26",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 430,
                                "matricula": "9484",
                                "name": "MORALES GUERRA VICTOR EDUARDO",
                                "email": "vemoralesg63@gmail.com",
                                "telefono": "52039317",
                                "nickname": "flaco",
                                "_code": "GUA-177-nKr",
                                "created_at": "2018-06-09 02:53:03",
                                "updated_at": "2018-06-09 02:53:03",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 431,
                                "matricula": "11223",
                                "name": "RIVERA DUARTE DANNY",
                                "email": "drdriverad@gmail.com",
                                "telefono": "85754111",
                                "nickname": "DNY81",
                                "_code": "COR-639-D0q",
                                "created_at": "2018-06-09 02:55:31",
                                "updated_at": "2018-07-05 02:52:08",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 432,
                                "matricula": "9484",
                                "name": "MORALES GUERRA VICTOR EDUARDO",
                                "email": "vmoralesginecologopet@yahoo.es",
                                "telefono": "52039317",
                                "nickname": "flaco",
                                "_code": "GUA-290-CKZ",
                                "created_at": "2018-06-09 03:01:30",
                                "updated_at": "2018-06-09 03:01:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 433,
                                "matricula": "13758",
                                "name": "José Antonio Saravia",
                                "email": "doctorsaravia@gmail.com",
                                "telefono": "23635273",
                                "nickname": "medico",
                                "_code": "GUA-501-UU5",
                                "created_at": "2018-06-09 04:00:20",
                                "updated_at": "2018-06-09 04:00:20",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 434,
                                "matricula": "10154",
                                "name": "Mario José Ortiz Paz",
                                "email": "mario250385@hotmail.com",
                                "telefono": "33630599",
                                "nickname": "MOP",
                                "_code": "HON-677-gJM",
                                "created_at": "2018-06-09 04:11:06",
                                "updated_at": "2018-06-09 04:11:06",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 435,
                                "matricula": "9243",
                                "name": "Palacio Rodriguez Mabelyn Michelle",
                                "email": "mabelynpalacios@yahoo.com",
                                "telefono": "32970102",
                                "nickname": "",
                                "_code": "HON-867-Gx5",
                                "created_at": "2018-06-09 04:17:36",
                                "updated_at": "2018-06-09 04:17:36",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 436,
                                "matricula": "0",
                                "name": "Luis Alejandro Sandoval Maroquín",
                                "email": "alejandrosandoval20950@gmail.com",
                                "telefono": "77305808",
                                "nickname": "Alejandro2095",
                                "_code": "SAL-751-yka",
                                "created_at": "2018-06-09 04:19:15",
                                "updated_at": "2018-06-09 04:19:15",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 437,
                                "matricula": "14896",
                                "name": "Brenda Ester Molina Canales",
                                "email": "brendadvega22@gmail.com",
                                "telefono": "32728047",
                                "nickname": "brendisvega",
                                "_code": "HON-002-Ur0",
                                "created_at": "2018-06-09 04:28:57",
                                "updated_at": "2018-06-09 04:28:57",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 438,
                                "matricula": "9041",
                                "name": "GARCIA ZALDIVAR JOSUE ABIMILETH",
                                "email": "josgar06@yahoo.es",
                                "telefono": "97530479",
                                "nickname": "jos",
                                "_code": "HON-327-3HQ",
                                "created_at": "2018-06-09 04:57:52",
                                "updated_at": "2018-06-19 16:15:49",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 439,
                                "matricula": "12000",
                                "name": "SEGOVIA DE GUILLEN KARLA ELENA",
                                "email": "kilosegovia@hotmail.com",
                                "telefono": "70082031",
                                "nickname": "Karla",
                                "_code": "SAL-600-Li5",
                                "created_at": "2018-06-09 06:17:03",
                                "updated_at": "2018-06-09 07:18:18",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 440,
                                "matricula": "15869",
                                "name": "CONTRERAS RUBIO VICTOR MANUEL",
                                "email": "josuehugito@hotmail.com",
                                "telefono": "76794661",
                                "nickname": "DrRubio88",
                                "_code": "SAL-478-hE1",
                                "created_at": "2018-06-09 06:33:23",
                                "updated_at": "2018-06-09 06:33:23",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 441,
                                "matricula": "5393",
                                "name": "Monica Arroyo",
                                "email": "monica-arroyodef@hotmail.com",
                                "telefono": "57081424",
                                "nickname": "Monica",
                                "_code": "GUA-404-vaF",
                                "created_at": "2018-06-09 07:06:09",
                                "updated_at": "2018-06-09 07:06:09",
                                "puntos": 123
                            }
                        },
                        {
                            "user": {
                                "id": 442,
                                "matricula": "15617",
                                "name": "URBINA MARTINEZ CARMEN LUCIA",
                                "email": "cl_urbina@yahoo.com",
                                "telefono": "41113827",
                                "nickname": "CLUM",
                                "_code": "GUA-280-yfs",
                                "created_at": "2018-06-09 07:17:40",
                                "updated_at": "2018-06-29 06:33:50",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 443,
                                "matricula": "1946",
                                "name": "REYES JUAN",
                                "email": "jubereman@yahoo.com",
                                "telefono": "50467050",
                                "nickname": "dondorindo",
                                "_code": "GUA-026-Ewo",
                                "created_at": "2018-06-09 07:50:11",
                                "updated_at": "2018-06-09 07:50:11",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 444,
                                "matricula": "10308",
                                "name": "MEJIA CANALES MARCELINO HUMBERTO",
                                "email": "mhmejiadr@gmail.com",
                                "telefono": "72724012",
                                "nickname": "mejia",
                                "_code": "SAL-451-n15",
                                "created_at": "2018-06-09 07:52:08",
                                "updated_at": "2018-06-09 07:52:08",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 445,
                                "matricula": "10614",
                                "name": "RODRIGUEZ HERNANDEZ YOHANA KATINA",
                                "email": "katyrohe1@yahoo.com",
                                "telefono": "58872490",
                                "nickname": "Kats",
                                "_code": "GUA-164-t2h",
                                "created_at": "2018-06-09 08:16:56",
                                "updated_at": "2018-06-09 08:16:56",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 446,
                                "matricula": "11556",
                                "name": "YAX GOMEZ JOSE RAFAEL",
                                "email": "rafitayax@yahoo.es",
                                "telefono": "57789640",
                                "nickname": "Rafiña",
                                "_code": "GUA-019-dBG",
                                "created_at": "2018-06-09 08:40:47",
                                "updated_at": "2018-06-09 08:40:47",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 447,
                                "matricula": "12136",
                                "name": "DEL VALLE MONTES DANY ESTUARDO",
                                "email": "danydvallem@gmail.com",
                                "telefono": "58088441",
                                "nickname": "Dany",
                                "_code": "GUA-146-1f9",
                                "created_at": "2018-06-09 09:38:52",
                                "updated_at": "2018-06-09 09:38:52",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 448,
                                "matricula": "13433",
                                "name": "Luz de María Bolaños Véliz",
                                "email": "lucymd2006@gmail.com",
                                "telefono": "40278052",
                                "nickname": "Luz",
                                "_code": "GUA-992-wxB",
                                "created_at": "2018-06-09 09:46:04",
                                "updated_at": "2018-06-09 09:46:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 449,
                                "matricula": "12108",
                                "name": "KARLA GRACIELA CAMPOS DE CAÑADA",
                                "email": "dra.karlacampos.pediatra@gmail.com",
                                "telefono": "71600708",
                                "nickname": "Karlacampos1980",
                                "_code": "SAL-992-ooS",
                                "created_at": "2018-06-09 15:39:28",
                                "updated_at": "2018-06-09 15:39:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 450,
                                "matricula": "8797",
                                "name": "LOPEZ GUADALUPE ROSARIO",
                                "email": "lupidoc68@yahoo.com",
                                "telefono": "75515401",
                                "nickname": "Guadalupe Lopez",
                                "_code": "SAL-334-V1c",
                                "created_at": "2018-06-09 19:03:23",
                                "updated_at": "2018-06-09 19:03:23",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 451,
                                "matricula": "5768",
                                "name": "MONGE CORDERO ANA RITA",
                                "email": "sofiajmonge@gmail.com",
                                "telefono": "25466080",
                                "nickname": "ritamonge",
                                "_code": "COR-667-BgL",
                                "created_at": "2018-06-09 19:04:01",
                                "updated_at": "2018-06-09 19:04:01",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 452,
                                "matricula": "2545",
                                "name": "GIAMATTEI TORRIELLO ROBERTO",
                                "email": "franciaangel1@gmail.com",
                                "telefono": "46948505",
                                "nickname": "Pachita",
                                "_code": "GUA-045-zCF",
                                "created_at": "2018-06-09 19:52:59",
                                "updated_at": "2018-06-09 19:52:59",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 453,
                                "matricula": "8491",
                                "name": "JOACHING RIVERA ALVARO ALONSO",
                                "email": "alvarojoachin@yahoo.com",
                                "telefono": "78603269",
                                "nickname": "alvarojoachin@yahoo.com",
                                "_code": "SAL-006-EQ9",
                                "created_at": "2018-06-09 20:35:28",
                                "updated_at": "2018-06-09 20:35:28",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 454,
                                "matricula": "11104",
                                "name": "RODAS GARCIA VIRNA EDITH",
                                "email": "virnaerodasg@yahoo.es",
                                "telefono": "56649697",
                                "nickname": "Virna Edith Rodas Garcia",
                                "_code": "GUA-523-uRJ",
                                "created_at": "2018-06-09 21:54:16",
                                "updated_at": "2018-07-10 06:06:14",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 455,
                                "matricula": "4440",
                                "name": "ALBAYEROS ALVAREZ JORGE ALEJANDRO",
                                "email": "jorgealbayeros10@hotmail.com",
                                "telefono": "72963121",
                                "nickname": "JorgeAlbayeros10",
                                "_code": "SAL-215-new",
                                "created_at": "2018-06-09 22:04:52",
                                "updated_at": "2018-06-09 22:04:52",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 456,
                                "matricula": "8566",
                                "name": "CHOXOM TUCUX LEONARDO",
                                "email": "drleonardoch@gmail.com",
                                "telefono": "54192688",
                                "nickname": "Nayo",
                                "_code": "GUA-201-MSC",
                                "created_at": "2018-06-09 22:13:03",
                                "updated_at": "2018-06-09 22:13:03",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 457,
                                "matricula": "12093",
                                "name": "ELISA REYNOSO",
                                "email": "clinicamedicajerusalen@gmail.com",
                                "telefono": "95227208",
                                "nickname": "masteraaron",
                                "_code": "HON-070-6CL",
                                "created_at": "2018-06-09 22:16:16",
                                "updated_at": "2018-06-09 22:16:16",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 458,
                                "matricula": "11275",
                                "name": "ALEGRIA SANTIAGO DE MENDOZA BETZY",
                                "email": "betzy.alegria@gmail.com",
                                "telefono": "59230565",
                                "nickname": "betzy.alegria@gmail.com",
                                "_code": "GUA-152-B0e",
                                "created_at": "2018-06-09 22:20:16",
                                "updated_at": "2018-06-09 22:20:16",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 459,
                                "matricula": "2154",
                                "name": "Carlos Fernando Vásquez",
                                "email": "vasquezcordero@yahoo.com",
                                "telefono": "54114053",
                                "nickname": "Cordero",
                                "_code": "GUA-881-9wP",
                                "created_at": "2018-06-09 22:37:39",
                                "updated_at": "2018-06-09 22:37:39",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 460,
                                "matricula": "6463",
                                "name": "CHANG RUIZ ESPERANZA",
                                "email": "esperanzachang1958@gmail.com",
                                "telefono": "40232012",
                                "nickname": "EsperanzaChang",
                                "_code": "gua-373-fuv",
                                "created_at": "2018-06-10 00:18:43",
                                "updated_at": "2018-07-06 09:14:26",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 461,
                                "matricula": "2685",
                                "name": "ALDANA HERNANDEZ OSCAR HUMBERTO",
                                "email": "oscarhaldanah@gmail.com",
                                "telefono": "59101601",
                                "nickname": "tortuga",
                                "_code": "GUA-913-5sW",
                                "created_at": "2018-06-10 00:50:36",
                                "updated_at": "2018-06-10 00:50:36",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 462,
                                "matricula": "3863",
                                "name": "RODAS BARRIOS DE ALDANA TELMA CONSUELO",
                                "email": "oscarjavieraldana@hotmail.com",
                                "telefono": "58619226",
                                "nickname": "raton",
                                "_code": "GUA-340-OWq",
                                "created_at": "2018-06-10 01:02:51",
                                "updated_at": "2018-06-10 01:02:51",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 463,
                                "matricula": "15494",
                                "name": "JURACAN MORAN MARIA EUGENIA",
                                "email": "shejur@gmail.com",
                                "telefono": "59237122",
                                "nickname": "shejur",
                                "_code": "GUA-764-dM9",
                                "created_at": "2018-06-10 01:23:16",
                                "updated_at": "2018-06-10 01:23:16",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 464,
                                "matricula": "3374",
                                "name": "Salazar Leiva Alfonso",
                                "email": "dr.asl@medicos.cr",
                                "telefono": "88818080",
                                "nickname": "ALFONSO SALAZAR",
                                "_code": "COR-954-T6V",
                                "created_at": "2018-06-10 01:27:11",
                                "updated_at": "2018-06-10 01:27:11",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 465,
                                "matricula": "123456789",
                                "name": "leonidas",
                                "email": "leony_2007@hotmaol.es",
                                "telefono": "72258822",
                                "nickname": "leony",
                                "_code": "SAL-911-4d7",
                                "created_at": "2018-06-10 01:27:22",
                                "updated_at": "2018-06-10 01:27:22",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 466,
                                "matricula": "16079",
                                "name": "Melina Ruano Morataya",
                                "email": "mielruano@yahoo.es",
                                "telefono": "56958462",
                                "nickname": "DoctoraJuguetes",
                                "_code": "GUA-733-VKy",
                                "created_at": "2018-06-10 01:40:20",
                                "updated_at": "2018-06-10 01:40:20",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 467,
                                "matricula": "213235",
                                "name": "Gabriela Saravia",
                                "email": "gabycolibri@hotmail.com",
                                "telefono": "94596919",
                                "nickname": "Usagi",
                                "_code": "HON-359-lCu",
                                "created_at": "2018-06-10 01:51:40",
                                "updated_at": "2018-06-10 01:51:40",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 468,
                                "matricula": "8196",
                                "name": "YANTUCHE AJCU COSMIN GIOVANNI",
                                "email": "mgyantuche@gmail.com",
                                "telefono": "24386894",
                                "nickname": "giovanni",
                                "_code": "GUA-051-Pqg",
                                "created_at": "2018-06-10 03:11:06",
                                "updated_at": "2018-06-10 03:11:06",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 469,
                                "matricula": "5584",
                                "name": "LIMA DIAZ ENA AURORA",
                                "email": "enalimad@hotmail.com",
                                "telefono": "52014835",
                                "nickname": "ena",
                                "_code": "GUA-521-uw7",
                                "created_at": "2018-06-10 03:13:18",
                                "updated_at": "2018-06-10 03:13:18",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 470,
                                "matricula": "14087",
                                "name": "Karol Ingram Montero",
                                "email": "natasha38@hotmail.com",
                                "telefono": "83124517",
                                "nickname": "ktasha",
                                "_code": "COR-089-8W2",
                                "created_at": "2018-06-10 03:24:08",
                                "updated_at": "2018-06-10 03:24:08",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 471,
                                "matricula": "11954",
                                "name": "ANTONIO DIAZ",
                                "email": "dr.tonydiaz@gmail.com",
                                "telefono": "7115-6724",
                                "nickname": "mutaro",
                                "_code": "sal-610-JUW",
                                "created_at": "2018-06-10 03:28:12",
                                "updated_at": "2018-06-10 03:28:12",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 472,
                                "matricula": "13757",
                                "name": "Diego Elliot Vargas",
                                "email": "diegoelliotb@gmail.com",
                                "telefono": "88978803",
                                "nickname": "Diego",
                                "_code": "cor-342-wdw",
                                "created_at": "2018-06-10 03:31:21",
                                "updated_at": "2018-06-10 03:31:21",
                                "puntos": 126
                            }
                        },
                        {
                            "user": {
                                "id": 473,
                                "matricula": "19029",
                                "name": "OLIVEROS RODRIGUEZ ISABEL",
                                "email": "isabeloliverosr@gmail.com",
                                "telefono": "52907443",
                                "nickname": "IsaOR",
                                "_code": "GUA-941-DxV",
                                "created_at": "2018-06-10 04:01:04",
                                "updated_at": "2018-06-10 04:01:04",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 474,
                                "matricula": "8721",
                                "name": "ARRIVILLAGA MENDEZ  MONICA ELIZABETH",
                                "email": "djyantuche@gmail.com",
                                "telefono": "56618256",
                                "nickname": "Mónica",
                                "_code": "GUA-376-MQ6",
                                "created_at": "2018-06-10 04:36:16",
                                "updated_at": "2018-06-10 04:36:16",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 475,
                                "matricula": "40108",
                                "name": "José Luis Giroud Benitez",
                                "email": "jlgiroud@gmail.com",
                                "telefono": "82995776",
                                "nickname": "Giroud",
                                "_code": "NIC-030-sh8",
                                "created_at": "2018-06-10 04:42:01",
                                "updated_at": "2018-06-10 04:42:01",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 476,
                                "matricula": "8702",
                                "name": "RODAS ALVAREZ CESAR DARIO",
                                "email": "dariorodas200@gmail.com",
                                "telefono": "78385209",
                                "nickname": "CESAR RODAS",
                                "_code": "SAL-807-elP",
                                "created_at": "2018-06-10 04:58:22",
                                "updated_at": "2018-06-10 04:58:22",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 477,
                                "matricula": "5238",
                                "name": "MAURICIO REYNA MAYRA JUDITH",
                                "email": "mayramauricioreina@yahoo.es",
                                "telefono": "56978550",
                                "nickname": "Dra. Mauricio",
                                "_code": "GUA-806-PUG",
                                "created_at": "2018-06-10 05:23:57",
                                "updated_at": "2018-06-10 05:23:57",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 478,
                                "matricula": "48364",
                                "name": "Mercedes Jamileth Cano Mayorga",
                                "email": "merchumayorga04@hotmail.com",
                                "telefono": "87213990",
                                "nickname": "Merch",
                                "_code": "NIC-229-VDD",
                                "created_at": "2018-06-10 05:55:37",
                                "updated_at": "2018-06-10 05:55:37",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 479,
                                "matricula": "10624",
                                "name": "ALVAREZ SOTO MAYLEEN DORYLEE",
                                "email": "may_alvarez73@hotmail.com",
                                "telefono": "52019183",
                                "nickname": "May",
                                "_code": "GUA-792-0Rv",
                                "created_at": "2018-06-10 06:55:36",
                                "updated_at": "2018-06-10 06:55:36",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 480,
                                "matricula": "10624",
                                "name": "ALVAREZ SOTO MAYLEEN DORYLEE",
                                "email": "dubon151141@unis.edu.gt",
                                "telefono": "52019183",
                                "nickname": "Mayleen",
                                "_code": "GUA-642-Cnx",
                                "created_at": "2018-06-10 07:04:48",
                                "updated_at": "2018-06-10 07:04:48",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 481,
                                "matricula": "12382",
                                "name": "Jairo",
                                "email": "jair69fc@hotmail.com",
                                "telefono": "31719693",
                                "nickname": "Jair69fc",
                                "_code": "HON-875-Ww8",
                                "created_at": "2018-06-10 07:08:53",
                                "updated_at": "2018-06-10 07:08:53",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 482,
                                "matricula": "8480",
                                "name": "José Ángel Arias González",
                                "email": "jaam1996@yahoo.com",
                                "telefono": "22660460-83815384",
                                "nickname": "José Ángel",
                                "_code": "NIC-504-U5O",
                                "created_at": "2018-06-10 07:39:35",
                                "updated_at": "2018-06-10 07:39:35",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 483,
                                "matricula": "9703",
                                "name": "MARTINEZ SOTO XIOMARA `PATRICIA",
                                "email": "tabacoymas@gmail.com",
                                "telefono": "61299554",
                                "nickname": "Xiomara",
                                "_code": "SAL-073-UxI",
                                "created_at": "2018-06-10 07:47:17",
                                "updated_at": "2018-06-10 07:47:17",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 484,
                                "matricula": "12054",
                                "name": "TURCIOS ESCRIBA JUAN CARLOS",
                                "email": "juancarlosturciosescriba@yahoo.com",
                                "telefono": "59116923",
                                "nickname": "Juan carlos",
                                "_code": "GUA-210-xgk",
                                "created_at": "2018-06-10 15:18:12",
                                "updated_at": "2018-07-10 06:44:27",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 485,
                                "matricula": "4064",
                                "name": "CARRILLO GONZALEZ CARLOS AUGUSTO",
                                "email": "carloscarrilloits@gmail.com",
                                "telefono": "31189510",
                                "nickname": "Carlos",
                                "_code": "GUA-943-jwk",
                                "created_at": "2018-06-10 18:58:02",
                                "updated_at": "2018-06-10 18:58:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 486,
                                "matricula": "10455",
                                "name": "HERNANDEZ CARDENAS WILBER JESUS",
                                "email": "wilberhc2000@yahoo.com",
                                "telefono": "87841310",
                                "nickname": "Clinicamedicah",
                                "_code": "HON-981-r4f",
                                "created_at": "2018-06-10 19:19:27",
                                "updated_at": "2018-06-10 19:19:27",
                                "puntos": 48
                            }
                        },
                        {
                            "user": {
                                "id": 487,
                                "matricula": "6304",
                                "name": "LUNA OSMIN ELISEO",
                                "email": "lunamayen@yahoo.com",
                                "telefono": "78514915",
                                "nickname": "oalmluna12",
                                "_code": "SAL-962-B8f",
                                "created_at": "2018-06-10 19:39:20",
                                "updated_at": "2018-06-10 19:39:20",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 488,
                                "matricula": "9156",
                                "name": "HERNANDEZ GIRON HUBERTH ALEXANDER",
                                "email": "huberth67@gmail.com",
                                "telefono": "56162397",
                                "nickname": "Huberth",
                                "_code": "GUA-171-is6",
                                "created_at": "2018-06-10 19:52:46",
                                "updated_at": "2018-06-10 19:52:46",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 489,
                                "matricula": "8432",
                                "name": "RAMÍREZ AGUILAR, JOSE ALFONSO",
                                "email": "dr_alramirez2006@yahoo.com",
                                "telefono": "57080719",
                                "nickname": "Dr.Alfonso",
                                "_code": "GUA-960-OQu",
                                "created_at": "2018-06-10 20:04:18",
                                "updated_at": "2018-07-05 03:49:14",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 490,
                                "matricula": "5977",
                                "name": "MORALES DE LUNA CLAUDIA PATRICIA",
                                "email": "moralesdeluna@hotmail.com",
                                "telefono": "78565998",
                                "nickname": "oalmluna159",
                                "_code": "SAL-992-gzY",
                                "created_at": "2018-06-10 20:24:45",
                                "updated_at": "2018-06-10 20:24:45",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 491,
                                "matricula": "11662",
                                "name": "Elia Zumaeta Marin",
                                "email": "ebril@hotmail.com",
                                "telefono": "70759545",
                                "nickname": "elzuma",
                                "_code": "COR-544-ULn",
                                "created_at": "2018-06-10 20:53:52",
                                "updated_at": "2018-06-10 20:53:52",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 492,
                                "matricula": "6350",
                                "name": "PEREZ VERHOFF ANTONIO CRISTOBAL",
                                "email": "drcuuba@gmail.com",
                                "telefono": "99863020",
                                "nickname": "antonioperez07",
                                "_code": "HON-153-QPB",
                                "created_at": "2018-06-10 21:39:54",
                                "updated_at": "2018-06-10 21:39:54",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 493,
                                "matricula": "16124",
                                "name": "Michelle Najera Romero",
                                "email": "michi_doc@hotmail.com",
                                "telefono": "52041487",
                                "nickname": "Mikitadoc",
                                "_code": "GUA-002-dbe",
                                "created_at": "2018-06-10 21:53:14",
                                "updated_at": "2018-06-10 21:53:14",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 494,
                                "matricula": "6625",
                                "name": "CORZANTES  BARRIOS  ANA  PATRICIA",
                                "email": "patcorz@gmail.com",
                                "telefono": "55137477",
                                "nickname": "patcorz",
                                "_code": "GUA-229-8QA",
                                "created_at": "2018-06-10 21:56:49",
                                "updated_at": "2018-06-10 21:56:49",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 495,
                                "matricula": "7586",
                                "name": "Maria Teresa Andara",
                                "email": "carlosandaramarin@gmail.con",
                                "telefono": "97113853",
                                "nickname": "Mary",
                                "_code": "HON-562-CgH",
                                "created_at": "2018-06-10 22:12:25",
                                "updated_at": "2018-06-10 22:12:25",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 496,
                                "matricula": "16041815609",
                                "name": "Emanuel Alejandro Palacios Sosa",
                                "email": "alejo89_2003@yahoo.com",
                                "telefono": "31528583",
                                "nickname": "Ema",
                                "_code": "HON-763-fMT",
                                "created_at": "2018-06-10 22:20:36",
                                "updated_at": "2018-06-10 22:20:36",
                                "puntos": 36
                            }
                        },
                        {
                            "user": {
                                "id": 497,
                                "matricula": "15305",
                                "name": "Carlos Roberto Santizo de León",
                                "email": "santizocarlos81@gmail.com",
                                "telefono": "41549094",
                                "nickname": "santizocarlos81",
                                "_code": "GUA-364-rEq",
                                "created_at": "2018-06-10 23:11:29",
                                "updated_at": "2018-06-10 23:11:29",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 498,
                                "matricula": "21516",
                                "name": "Jorge López",
                                "email": "jorgeantoniosolares@gmail.com",
                                "telefono": "50010143",
                                "nickname": "Jorge",
                                "_code": "GUA-361-zXS",
                                "created_at": "2018-06-10 23:21:42",
                                "updated_at": "2018-06-10 23:21:42",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 499,
                                "matricula": "14777",
                                "name": "Marlon Ingram Montero",
                                "email": "marmota112@hotmail.com",
                                "telefono": "83180237",
                                "nickname": "Marmota",
                                "_code": "COR-929-CtT",
                                "created_at": "2018-06-10 23:28:55",
                                "updated_at": "2018-06-10 23:28:55",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 500,
                                "matricula": "17362",
                                "name": "Veronica Aguirre",
                                "email": "azucenitaguirre@gmail.com",
                                "telefono": "78196299",
                                "nickname": "Azucena",
                                "_code": "SAL-118-5ha",
                                "created_at": "2018-06-11 00:18:13",
                                "updated_at": "2018-06-11 00:18:13",
                                "puntos": 42
                            }
                        },
                        {
                            "user": {
                                "id": 501,
                                "matricula": "2845",
                                "name": "MIJANGOS CORONADO GONZALO ALBERTO",
                                "email": "amijangosc@hotmail.com",
                                "telefono": "59231023",
                                "nickname": "Alberto Mijangos",
                                "_code": "GUA-759-0dc",
                                "created_at": "2018-06-11 00:29:50",
                                "updated_at": "2018-06-11 00:29:50",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 502,
                                "matricula": "10151",
                                "name": "CHAVARRIA LARA CAMILO BALTAZAR",
                                "email": "drcamilochavarria@hotmail.com",
                                "telefono": "7886-5245",
                                "nickname": "drcam",
                                "_code": "SAL-623-V2E",
                                "created_at": "2018-06-11 01:12:43",
                                "updated_at": "2018-06-11 01:18:04",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 503,
                                "matricula": "5.424",
                                "name": "NO NAME - NEW  Oscar Eluvio Rodriguez López",
                                "email": "kokarodriguez595@gmail.com",
                                "telefono": "54512159 ó 42194709",
                                "nickname": "Koka",
                                "_code": "GUA-196-elO",
                                "created_at": "2018-06-11 01:41:54",
                                "updated_at": "2018-06-11 01:41:54",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 504,
                                "matricula": "3005",
                                "name": "TERCERO SOTO JORGE FRANCISCO",
                                "email": "jorgefrtercero@gmail.com",
                                "telefono": "57087991",
                                "nickname": "Jorge",
                                "_code": "GUA-309-t0v",
                                "created_at": "2018-06-11 01:56:20",
                                "updated_at": "2018-06-11 01:56:20",
                                "puntos": 141
                            }
                        },
                        {
                            "user": {
                                "id": 505,
                                "matricula": "5493",
                                "name": "GOMEZ DE MENJIVAR CATALINA",
                                "email": "catalina.gomez01@gmail.com",
                                "telefono": "78902828",
                                "nickname": "Catalina Gómez de Menjivar",
                                "_code": "SAL-684-qBP",
                                "created_at": "2018-06-11 02:14:42",
                                "updated_at": "2018-06-11 02:14:42",
                                "puntos": 41
                            }
                        },
                        {
                            "user": {
                                "id": 506,
                                "matricula": "1057",
                                "name": "Juan Sergio García Córdova",
                                "email": "jsergiogarciacordova@gmail.com",
                                "telefono": "59027735",
                                "nickname": "SGC",
                                "_code": "GUA-873-QRO",
                                "created_at": "2018-06-11 02:30:34",
                                "updated_at": "2018-06-11 02:30:34",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 507,
                                "matricula": "4899",
                                "name": "Marino Ramirez Carranza",
                                "email": "mramirez@medicos.cr",
                                "telefono": "89169113",
                                "nickname": "melito",
                                "_code": "COR-043-jpP",
                                "created_at": "2018-06-11 02:32:45",
                                "updated_at": "2018-06-11 02:42:34",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 508,
                                "matricula": "10000771",
                                "name": "Sol Violeta Cristobalina López Gómez",
                                "email": "dra.solvioletalopez@gmail.com",
                                "telefono": "59492993",
                                "nickname": "Sol López",
                                "_code": "GUA-024-xkT",
                                "created_at": "2018-06-11 03:50:30",
                                "updated_at": "2018-06-11 03:50:30",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 509,
                                "matricula": "13605",
                                "name": "MURALLES OLIVA MELINA",
                                "email": "melimuralles@gmail.com",
                                "telefono": "51553333",
                                "nickname": "MMO",
                                "_code": "GUA-311-2Le",
                                "created_at": "2018-06-11 04:19:09",
                                "updated_at": "2018-07-10 16:07:49",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 510,
                                "matricula": "17459",
                                "name": "Carmen maria Barrientos Gómez",
                                "email": "carmenmaria257@gmail.com",
                                "telefono": "33333355",
                                "nickname": "Carmenb",
                                "_code": "Gua-673-rma",
                                "created_at": "2018-06-11 04:30:23",
                                "updated_at": "2018-06-11 04:30:23",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 511,
                                "matricula": "4394",
                                "name": "MORENO BARRERA EDUARDO FELIPE",
                                "email": "efmb12@hotmail.com",
                                "telefono": "5202-6799",
                                "nickname": "Edito",
                                "_code": "GUA-439-1Jg",
                                "created_at": "2018-06-11 04:36:50",
                                "updated_at": "2018-06-11 04:36:50",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 512,
                                "matricula": "8467",
                                "name": "Edgar David Sapón Chos",
                                "email": "edshonsap@hotmail.com",
                                "telefono": "52702261",
                                "nickname": "saponito",
                                "_code": "GUA-253-b5C",
                                "created_at": "2018-06-11 04:45:49",
                                "updated_at": "2018-06-11 04:45:49",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 513,
                                "matricula": "8529",
                                "name": "REYES CASTELLANOS EDWIN GIOVANNI",
                                "email": "evannikings@yahoo.com",
                                "telefono": "59197471",
                                "nickname": "Giovanni Reyes",
                                "_code": "GUA-086-FK2",
                                "created_at": "2018-06-11 05:02:11",
                                "updated_at": "2018-06-11 05:02:11",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 514,
                                "matricula": "2541",
                                "name": "LAMBOUR LIZAMA CÉSAR AUGUSTO",
                                "email": "ceslambour@gmail.com",
                                "telefono": "50197533",
                                "nickname": "Cesar",
                                "_code": "GUA-782-5zx",
                                "created_at": "2018-06-11 05:11:46",
                                "updated_at": "2018-06-11 05:11:46",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 515,
                                "matricula": "8793",
                                "name": "FIGUEROA ERAZO LUIS EDUARDO",
                                "email": "lef567@hotmail.com",
                                "telefono": "59015416",
                                "nickname": "Luisito",
                                "_code": "GUA-366-eu4",
                                "created_at": "2018-06-11 05:29:06",
                                "updated_at": "2018-06-11 05:29:06",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 516,
                                "matricula": "9086",
                                "name": "Ligia Maria Sauceda Godoy",
                                "email": "lmsauceda85@yahoo.es",
                                "telefono": "99677309",
                                "nickname": "La chaparrita de mi cacheton",
                                "_code": "HON-070-0q8",
                                "created_at": "2018-06-11 05:52:49",
                                "updated_at": "2018-06-11 05:52:49",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 517,
                                "matricula": "6682",
                                "name": "VILLEGAS  GONZALES  OSCAR  ESTUARDO",
                                "email": "estuardooscar7373@gmail.com",
                                "telefono": "42984232",
                                "nickname": "tito",
                                "_code": "GUA-892-CXI",
                                "created_at": "2018-06-11 06:07:19",
                                "updated_at": "2018-06-11 06:07:19",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 518,
                                "matricula": "10",
                                "name": "CLARA ESPERANZA CASTEJON TUNCHEZ DE SANTOS",
                                "email": "clara.castejon@yahoo.com",
                                "telefono": "58264308",
                                "nickname": "CLARA",
                                "_code": "GUA-768-05O",
                                "created_at": "2018-06-11 06:30:37",
                                "updated_at": "2018-06-11 06:30:37",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 519,
                                "matricula": "12399",
                                "name": "Luis Alfredo Rodriguez Castellanos",
                                "email": "luigicastellanos@yahoo.com",
                                "telefono": "97574784",
                                "nickname": "Luigircas",
                                "_code": "HON-996-PdB",
                                "created_at": "2018-06-11 06:37:02",
                                "updated_at": "2018-06-20 11:19:11",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 520,
                                "matricula": "5657",
                                "name": "ARIAS ROY FRANCISCO",
                                "email": "drarias_leiva@hotmail.com",
                                "telefono": "88894177",
                                "nickname": "Roy",
                                "_code": "COR-235-JEh",
                                "created_at": "2018-06-11 06:43:12",
                                "updated_at": "2018-06-30 06:43:11",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 521,
                                "matricula": "16806",
                                "name": "GUERRERO  FRUTOS   LUDMILA",
                                "email": "lguerrerofrutos@gmail.com",
                                "telefono": "41118348",
                                "nickname": "Liu",
                                "_code": "GUA-616-SrP",
                                "created_at": "2018-06-11 07:03:18",
                                "updated_at": "2018-06-14 21:05:11",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 522,
                                "matricula": "5278",
                                "name": "Badilla Araya Ronny",
                                "email": "drbadilla@hotmail.com",
                                "telefono": "83182472",
                                "nickname": "Ronny",
                                "_code": "COR-107-FFF",
                                "created_at": "2018-06-11 07:36:11",
                                "updated_at": "2018-06-11 07:36:11",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 523,
                                "matricula": "10810",
                                "name": "CARRASCO MEDRANO JENNY CAROLINA",
                                "email": "jennycarrasco27@hotmail.com",
                                "telefono": "31753427",
                                "nickname": "Jenny Carrasco",
                                "_code": "HON-715-rcR",
                                "created_at": "2018-06-11 07:43:34",
                                "updated_at": "2018-06-11 07:43:34",
                                "puntos": 120
                            }
                        },
                        {
                            "user": {
                                "id": 524,
                                "matricula": "12977",
                                "name": "Luis Pedro Pastor Monterroso",
                                "email": "drluisppastor@gmail.com",
                                "telefono": "52037436",
                                "nickname": "Lipe",
                                "_code": "GUA-048-mTv",
                                "created_at": "2018-06-11 08:14:38",
                                "updated_at": "2018-06-11 08:14:38",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 525,
                                "matricula": "3605",
                                "name": "SALAZAR GUTIERREZ ISMAEL OCTAVIO",
                                "email": "salazardiegon@gmail.com",
                                "telefono": "540156665",
                                "nickname": "IOSG",
                                "_code": "GUA-619-TKA",
                                "created_at": "2018-06-11 08:20:27",
                                "updated_at": "2018-06-11 08:20:27",
                                "puntos": 119
                            }
                        },
                        {
                            "user": {
                                "id": 526,
                                "matricula": "6775",
                                "name": "Erwin Horacio Campos Arroyo",
                                "email": "drerwinhcamposa@gmail.com",
                                "telefono": "54344965",
                                "nickname": "DrCampos",
                                "_code": "GUA-073-XDR",
                                "created_at": "2018-06-11 08:35:31",
                                "updated_at": "2018-06-11 08:35:31",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 527,
                                "matricula": "9128",
                                "name": "Jose Mauricio Galeano Santos",
                                "email": "mauro186@yahoo.com",
                                "telefono": "(504) 9675-0855",
                                "nickname": "jmauro186",
                                "_code": "HON-280-IcG",
                                "created_at": "2018-06-11 09:05:39",
                                "updated_at": "2018-06-11 09:05:39",
                                "puntos": 34
                            }
                        },
                        {
                            "user": {
                                "id": 528,
                                "matricula": "6986",
                                "name": "julioReynaldo Carrion Padilla",
                                "email": "juliorotario@hotmail.com",
                                "telefono": "88857058",
                                "nickname": "julio",
                                "_code": "NIC-715-g2m",
                                "created_at": "2018-06-11 09:59:44",
                                "updated_at": "2018-06-11 09:59:44",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 529,
                                "matricula": "10825",
                                "name": "ERIC GERARDO SANTOS SANCHEZ",
                                "email": "egsantos237@gmail.com",
                                "telefono": "87373082",
                                "nickname": "Eric",
                                "_code": "HON-510-47s",
                                "created_at": "2018-06-11 10:55:13",
                                "updated_at": "2018-06-11 10:55:13",
                                "puntos": 121
                            }
                        },
                        {
                            "user": {
                                "id": 530,
                                "matricula": "12230",
                                "name": "ALEJANDRA MARIA MEJIA MONTERO",
                                "email": "esantos237@icloud.com",
                                "telefono": "87373082",
                                "nickname": "ALE",
                                "_code": "HON-183-r9S",
                                "created_at": "2018-06-11 11:37:15",
                                "updated_at": "2018-06-11 11:37:15",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 531,
                                "matricula": "9286",
                                "name": "juan carlos hernandez cardenas",
                                "email": "hernandezmedicalcenter@gmail.com",
                                "telefono": "2309578",
                                "nickname": "kali",
                                "_code": "cor-976-buo",
                                "created_at": "2018-06-11 17:35:43",
                                "updated_at": "2018-06-11 17:35:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 532,
                                "matricula": "8782",
                                "name": "CASTILLO LOPEZ ALLAN",
                                "email": "dr.allancastillolopez@gmail.com",
                                "telefono": "83633978",
                                "nickname": "Dr. Castillo",
                                "_code": "COR-781-Iqt",
                                "created_at": "2018-06-11 19:10:25",
                                "updated_at": "2018-06-11 19:10:25",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 533,
                                "matricula": "11773",
                                "name": "MORALES FAJARDO EDDIE STUARDO",
                                "email": "neurocirugiaxela4143@gmail.com",
                                "telefono": "+50255210057",
                                "nickname": "EDDIE",
                                "_code": "GUA-176-WxR",
                                "created_at": "2018-06-11 19:18:23",
                                "updated_at": "2018-06-29 05:53:14",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 534,
                                "matricula": "13431",
                                "name": "Luis Enrique lopez",
                                "email": "enrikesluis.lopez@gmail.com",
                                "telefono": "31862612",
                                "nickname": "Luis",
                                "_code": "HON-777-2GQ",
                                "created_at": "2018-06-11 19:46:36",
                                "updated_at": "2018-06-11 19:46:36",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 535,
                                "matricula": "11964",
                                "name": "jose fernando medina reyes",
                                "email": "ferqko1@yahoo.com",
                                "telefono": "+50432449421",
                                "nickname": "fernando",
                                "_code": "HON-625-LKY",
                                "created_at": "2018-06-11 19:51:13",
                                "updated_at": "2018-06-11 19:51:13",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 536,
                                "matricula": "4484",
                                "name": "Antonio Obando",
                                "email": "sanatoriosanfrancisco@yahoo.com.mx",
                                "telefono": "53062153",
                                "nickname": "Tono",
                                "_code": "GUA-178-rSm",
                                "created_at": "2018-06-11 20:44:52",
                                "updated_at": "2018-06-11 20:44:52",
                                "puntos": 121
                            }
                        },
                        {
                            "user": {
                                "id": 537,
                                "matricula": "33062",
                                "name": "FAJARDO TAPIA JOSE MIGUEL",
                                "email": "drche07@gmail.com",
                                "telefono": "84904440",
                                "nickname": "DrChe",
                                "_code": "NIC-771-CQW",
                                "created_at": "2018-06-11 20:46:43",
                                "updated_at": "2018-06-11 20:46:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 538,
                                "matricula": "17665",
                                "name": "Lourdes Bustillo",
                                "email": "lourdesbustillo@hotmail.com",
                                "telefono": "78836005",
                                "nickname": "LBustillo89",
                                "_code": "SAL-037-pMz",
                                "created_at": "2018-06-11 20:55:40",
                                "updated_at": "2018-06-11 20:55:40",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 539,
                                "matricula": "7883",
                                "name": "IXTACUY CHAMALE JACOBO ALBERTO",
                                "email": "jacoboixtacuy@gmail.com",
                                "telefono": "42696568",
                                "nickname": "jacobo ixtacuy",
                                "_code": "GUA-371-rKz",
                                "created_at": "2018-06-11 20:58:23",
                                "updated_at": "2018-06-11 20:58:23",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 540,
                                "matricula": "3542",
                                "name": "MAGAÑA FARFAN VILMA DAYSI",
                                "email": "maganavilma91@yahoo.com",
                                "telefono": "75574870",
                                "nickname": "mita",
                                "_code": "SAL-779-VzX",
                                "created_at": "2018-06-11 20:58:57",
                                "updated_at": "2018-06-11 20:58:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 541,
                                "matricula": "7782",
                                "name": "PADILLA CALVO SUSANA",
                                "email": "supc2708@gmail.com",
                                "telefono": "83614376",
                                "nickname": "supadilla",
                                "_code": "COR-232-Yez",
                                "created_at": "2018-06-11 21:03:19",
                                "updated_at": "2018-06-11 21:03:19",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 542,
                                "matricula": "1121",
                                "name": "PACHECO MORAN ERNESTO GIOVANNI",
                                "email": "giovanni0073@hotmail.com",
                                "telefono": "502-40056385",
                                "nickname": "Pacheco",
                                "_code": "Gua-075-8vz",
                                "created_at": "2018-06-11 21:05:04",
                                "updated_at": "2018-06-11 21:05:04",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 543,
                                "matricula": "8282",
                                "name": "AJTUN LINARES ERY WILLIAM",
                                "email": "drsajtunycarrera@gmail.com",
                                "telefono": "54191586",
                                "nickname": "Wilian",
                                "_code": "GUA-461-tiM",
                                "created_at": "2018-06-11 21:07:33",
                                "updated_at": "2018-06-11 21:07:33",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 544,
                                "matricula": "9531",
                                "name": "GIRON SOLORZANO CELMA EDITH",
                                "email": "grupopace10@gmail.com",
                                "telefono": "46006309",
                                "nickname": "CELMUCA",
                                "_code": "GUA-764-2uP",
                                "created_at": "2018-06-11 21:17:52",
                                "updated_at": "2018-06-11 21:17:52",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 545,
                                "matricula": "4609",
                                "name": "GRIJALVA MINERA CARLOS HUMBERTO",
                                "email": "rodrigo_grijalva@hotmail.com",
                                "telefono": "77618609",
                                "nickname": "CarGri",
                                "_code": "GUA-437-O2F",
                                "created_at": "2018-06-11 21:26:54",
                                "updated_at": "2018-06-11 21:26:54",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 546,
                                "matricula": "17478",
                                "name": "ERY WILIAN AJTUN CARRERA",
                                "email": "ewac23589@gmail.com",
                                "telefono": "42115871",
                                "nickname": "ERY",
                                "_code": "GUA-015-EoV",
                                "created_at": "2018-06-11 21:39:26",
                                "updated_at": "2018-06-11 21:39:26",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 547,
                                "matricula": "17196",
                                "name": "SALOJ SALOJ A. LILIAN",
                                "email": "anlilisaloj@hotmail.com",
                                "telefono": "58593231",
                                "nickname": "Anasaloj",
                                "_code": "GUA-975-tD7",
                                "created_at": "2018-06-11 21:43:16",
                                "updated_at": "2018-06-11 21:43:16",
                                "puntos": 20
                            }
                        },
                        {
                            "user": {
                                "id": 548,
                                "matricula": "13449",
                                "name": "JOACHIN DOMINGUEZ FREDDY ROCAEL",
                                "email": "joachin_fredy@yahoo.es",
                                "telefono": "58659407",
                                "nickname": "Fredy",
                                "_code": "GUA-136-z5T",
                                "created_at": "2018-06-11 21:52:32",
                                "updated_at": "2018-06-11 21:52:32",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 549,
                                "matricula": "5546",
                                "name": "MORAN MORAN JOSÉ LUIS",
                                "email": "joluismoranm@hotmail.com",
                                "telefono": "502-59688383",
                                "nickname": "Jose Luis",
                                "_code": "GUA-623-zGK",
                                "created_at": "2018-06-11 22:13:29",
                                "updated_at": "2018-06-11 22:13:29",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 550,
                                "matricula": "1998",
                                "name": "FLAMENCO ERAZO EDGARDO",
                                "email": "dredgarderazo@gmail.com",
                                "telefono": "78528605",
                                "nickname": "Ed",
                                "_code": "SAL-003-Fic",
                                "created_at": "2018-06-11 22:27:55",
                                "updated_at": "2018-06-11 22:27:55",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 551,
                                "matricula": "11975",
                                "name": "Oscar Antonio Portillo Alvarado",
                                "email": "droscarportillo@hotmail.com",
                                "telefono": "71708906",
                                "nickname": "Portillo",
                                "_code": "SAL-965-9cA",
                                "created_at": "2018-06-11 22:34:58",
                                "updated_at": "2018-06-11 22:34:58",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 552,
                                "matricula": "6500",
                                "name": "SAABEDRA JOSE ROBERTO",
                                "email": "joserobertohernandezaaavedra@hotmail.com",
                                "telefono": "77867328",
                                "nickname": "Jose  Roberto",
                                "_code": "SAL-692-Nj0",
                                "created_at": "2018-06-11 22:35:08",
                                "updated_at": "2018-06-11 22:35:08",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 553,
                                "matricula": "13965",
                                "name": "William Mauricio Linares",
                                "email": "will.med84@gmail.com",
                                "telefono": "78564715",
                                "nickname": "Dr.Linares",
                                "_code": "SAL-230-SVC",
                                "created_at": "2018-06-11 22:39:39",
                                "updated_at": "2018-06-14 06:22:39",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 554,
                                "matricula": "14303",
                                "name": "CASASOLA URRUTIA CARLOS AMILCAR",
                                "email": "drcarloscasasola@hotmail.com",
                                "telefono": "46173559",
                                "nickname": "camicasu",
                                "_code": "GUA-932-5v1",
                                "created_at": "2018-06-11 22:42:39",
                                "updated_at": "2018-06-11 22:42:39",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 555,
                                "matricula": "3131",
                                "name": "GUZMAN ARTEAGA LUIS ALONSO",
                                "email": "chrisgal_20@hotmail.com",
                                "telefono": "7851872",
                                "nickname": "LUIS GUZMAN",
                                "_code": "SAL-033-tqt",
                                "created_at": "2018-06-11 22:44:58",
                                "updated_at": "2018-06-11 22:44:58",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 556,
                                "matricula": "17831",
                                "name": "Gery Ronaldo Suárez Zavala",
                                "email": "grsuagt@gmail.com",
                                "telefono": "54667738",
                                "nickname": "Rony",
                                "_code": "GUA-513-4tN",
                                "created_at": "2018-06-11 22:55:45",
                                "updated_at": "2018-06-11 22:55:45",
                                "puntos": 132
                            }
                        },
                        {
                            "user": {
                                "id": 557,
                                "matricula": "16627",
                                "name": "GIRON OSEGUEDA CESAR FRANCISCO",
                                "email": "cesar.giron1988@gmail.com",
                                "telefono": "72106021",
                                "nickname": "CFGIRON",
                                "_code": "SAL-504-QIR",
                                "created_at": "2018-06-11 23:01:45",
                                "updated_at": "2018-06-11 23:01:45",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 558,
                                "matricula": "5798",
                                "name": "MEJIA SALVADOR MIGUEL ANGEL",
                                "email": "drmiguelm1961@gmail.com",
                                "telefono": "56922462",
                                "nickname": "Nostradamus2012",
                                "_code": "GUA-691-lqw",
                                "created_at": "2018-06-11 23:02:26",
                                "updated_at": "2018-06-11 23:02:26",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 559,
                                "matricula": "10296",
                                "name": "JOSE RICARDO DUARTE MORALES",
                                "email": "jricardoduarte1@gmail.com",
                                "telefono": "55239366-79412264",
                                "nickname": "cistiano ronaldo",
                                "_code": "GUA-030-gVv",
                                "created_at": "2018-06-11 23:02:36",
                                "updated_at": "2018-06-11 23:02:36",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 560,
                                "matricula": "10083",
                                "name": "LUNA SANCHEZ HECTOR JOSE",
                                "email": "hectluna@hotmail.com",
                                "telefono": "53188082",
                                "nickname": "Hector Luna",
                                "_code": "GUA-164-8RE",
                                "created_at": "2018-06-11 23:07:55",
                                "updated_at": "2018-06-11 23:07:55",
                                "puntos": 116
                            }
                        },
                        {
                            "user": {
                                "id": 561,
                                "matricula": "6123",
                                "name": "MENDEZ SANCHEZ LUIS ALFONSO",
                                "email": "drluisamendez@gmail.com",
                                "telefono": "50245775598",
                                "nickname": "drluisamendez@gmail.com",
                                "_code": "GUA-233-i7v",
                                "created_at": "2018-06-11 23:23:56",
                                "updated_at": "2018-06-11 23:23:56",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 562,
                                "matricula": "14811",
                                "name": "Fernanda gamboa chinchilla",
                                "email": "dragamboach@gmail.com",
                                "telefono": "85192913",
                                "nickname": "Fer",
                                "_code": "COR-560-GTt",
                                "created_at": "2018-06-11 23:37:39",
                                "updated_at": "2018-06-11 23:37:39",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 563,
                                "matricula": "11617",
                                "name": "Dennys Rodriguez",
                                "email": "dennysmarcialr@gmail.com",
                                "telefono": "32822732",
                                "nickname": "Dennys",
                                "_code": "HON-304-X6n",
                                "created_at": "2018-06-12 00:00:27",
                                "updated_at": "2018-06-12 00:00:27",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 564,
                                "matricula": "11950",
                                "name": "marlo josue vargas valladares",
                                "email": "majovar_17@hotmail.com",
                                "telefono": "97559491",
                                "nickname": "majovar_17",
                                "_code": "hon-443-huD",
                                "created_at": "2018-06-12 00:09:22",
                                "updated_at": "2018-06-28 19:02:46",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 565,
                                "matricula": "57316",
                                "name": "Fabiana Terrazas",
                                "email": "tf.fabiana@gmail.com",
                                "telefono": "86746768",
                                "nickname": "Fabs",
                                "_code": "NIC-970-O26",
                                "created_at": "2018-06-12 00:26:21",
                                "updated_at": "2018-06-12 00:26:21",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 566,
                                "matricula": "1471",
                                "name": "SIERRA CHIUS ALBERTO",
                                "email": "albertosierra04@hotmail.com",
                                "telefono": "22285923",
                                "nickname": "Alberto sierra",
                                "_code": "COR-059-ApE",
                                "created_at": "2018-06-12 00:33:34",
                                "updated_at": "2018-06-12 00:33:34",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 567,
                                "matricula": "7384",
                                "name": "Christian Montoya Hernandez",
                                "email": "crsmon1979@hotmail.com",
                                "telefono": "(506)88046811",
                                "nickname": "CRS",
                                "_code": "COR-612-N73",
                                "created_at": "2018-06-12 00:46:52",
                                "updated_at": "2018-06-12 00:46:52",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 568,
                                "matricula": "25091511479",
                                "name": "Holly Kattan",
                                "email": "hollykattan@hotmail.com",
                                "telefono": "96328147",
                                "nickname": "flash85",
                                "_code": "HON-624-Skm",
                                "created_at": "2018-06-12 00:52:46",
                                "updated_at": "2018-06-12 00:52:46",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 569,
                                "matricula": "5659",
                                "name": "Manuel Montúfar Urízar",
                                "email": "serchmontufar@gmail.com",
                                "telefono": "40784009",
                                "nickname": "mundomontufar",
                                "_code": "GUA-022-PwT",
                                "created_at": "2018-06-12 00:56:14",
                                "updated_at": "2018-06-12 00:56:14",
                                "puntos": 58
                            }
                        },
                        {
                            "user": {
                                "id": 570,
                                "matricula": "5774",
                                "name": "Jose Pablo Morales Garcia",
                                "email": "void919@gmail.com",
                                "telefono": "83948055",
                                "nickname": "JP",
                                "_code": "COR-488-doG",
                                "created_at": "2018-06-12 00:58:44",
                                "updated_at": "2018-06-12 00:58:44",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 571,
                                "matricula": "18398",
                                "name": "NO NAME - NEW USER",
                                "email": "martinezabner2@gmail.com",
                                "telefono": "56334665",
                                "nickname": "Abner",
                                "_code": "GUA-387-yPO",
                                "created_at": "2018-06-12 01:02:28",
                                "updated_at": "2018-06-12 01:02:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 572,
                                "matricula": "9738",
                                "name": "GALINDO DONAIRE JOSE ROBERTO",
                                "email": "jr.galindodonaire@gmail.com",
                                "telefono": "31718788",
                                "nickname": "Jose Roberto",
                                "_code": "HON-694-uUF",
                                "created_at": "2018-06-12 01:11:40",
                                "updated_at": "2018-06-12 01:11:40",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 573,
                                "matricula": "6819",
                                "name": "Manuel",
                                "email": "quiquesoto@gmail.com",
                                "telefono": "88432240",
                                "nickname": "Quiquesoto",
                                "_code": "COR-525-9Fx",
                                "created_at": "2018-06-12 01:20:57",
                                "updated_at": "2018-06-12 01:20:57",
                                "puntos": 29
                            }
                        },
                        {
                            "user": {
                                "id": 574,
                                "matricula": "15465",
                                "name": "Karla Cabrera",
                                "email": "karlacabrera07@gmail.com",
                                "telefono": "57076480",
                                "nickname": "Karlis",
                                "_code": "GUA-861-uXX",
                                "created_at": "2018-06-12 01:58:43",
                                "updated_at": "2018-06-12 01:58:43",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 575,
                                "matricula": "13442",
                                "name": "ARGUETA FLORES MARIA ELISA",
                                "email": "marieargueta@hotmail.com",
                                "telefono": "53329449",
                                "nickname": "MarieA",
                                "_code": "GUA-172-cqF",
                                "created_at": "2018-06-12 02:19:42",
                                "updated_at": "2018-06-12 02:19:42",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 576,
                                "matricula": "2939",
                                "name": "MALDONADO RAFAEL",
                                "email": "jmms26@gmail.com",
                                "telefono": "75872302",
                                "nickname": "litoma",
                                "_code": "SAL-051-Mxn",
                                "created_at": "2018-06-12 02:28:06",
                                "updated_at": "2018-06-12 02:28:06",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 577,
                                "matricula": "20185",
                                "name": "ROXANA SUCELY PIVARAL MEZA",
                                "email": "rspmeza@gmail.com",
                                "telefono": "4215-4369",
                                "nickname": "ROXYGOL",
                                "_code": "GUA-234-E7K",
                                "created_at": "2018-06-12 02:28:13",
                                "updated_at": "2018-06-12 02:28:13",
                                "puntos": 120
                            }
                        },
                        {
                            "user": {
                                "id": 578,
                                "matricula": "10256",
                                "name": "ADALID FEDERICO MENDOZA",
                                "email": "licko0703@hotmail.com",
                                "telefono": "97827593",
                                "nickname": "chavolicko",
                                "_code": "HON-369-b0L",
                                "created_at": "2018-06-12 02:28:53",
                                "updated_at": "2018-06-12 02:28:53",
                                "puntos": 119
                            }
                        },
                        {
                            "user": {
                                "id": 579,
                                "matricula": "10463",
                                "name": "victor manuel huitz sosa",
                                "email": "dr.huitz@hotmail.com",
                                "telefono": "502 55175415",
                                "nickname": "victor huitz",
                                "_code": "GUA-552-yek",
                                "created_at": "2018-06-12 02:29:49",
                                "updated_at": "2018-06-12 02:29:49",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 580,
                                "matricula": "28556",
                                "name": "TELLEZ PRADO CHEZRA ARJUNA",
                                "email": "chatp79@gmail.com",
                                "telefono": "87088708",
                                "nickname": "Chatp",
                                "_code": "NIC-588-bVd",
                                "created_at": "2018-06-12 02:36:42",
                                "updated_at": "2018-06-12 02:36:42",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 581,
                                "matricula": "7357",
                                "name": "BARAHONA JESSICA BETHYNA",
                                "email": "cfba871@gmail.com",
                                "telefono": "504 94630295",
                                "nickname": "Faby",
                                "_code": "HON-048-kuF",
                                "created_at": "2018-06-12 02:37:10",
                                "updated_at": "2018-06-12 02:37:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 582,
                                "matricula": "13310",
                                "name": "RAMIREZ SIERRA JORGE FEDERICO",
                                "email": "peditrajramirez@yahoo.com",
                                "telefono": "41493888",
                                "nickname": "Jorge",
                                "_code": "GUA-968-9ov",
                                "created_at": "2018-06-12 02:49:56",
                                "updated_at": "2018-06-12 02:49:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 583,
                                "matricula": "3898",
                                "name": "Sergio Orlando Palencia Rojas",
                                "email": "drsergiopalencia@yahoo.com",
                                "telefono": "55188129",
                                "nickname": "Sergio Orlando Palencia Rojas",
                                "_code": "GUA-356-bhD",
                                "created_at": "2018-06-12 02:53:56",
                                "updated_at": "2018-06-12 02:53:56",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 584,
                                "matricula": "15539",
                                "name": "Andrés Enrique Cuyún Gaitán",
                                "email": "andrescuyun@gmail.com",
                                "telefono": "48882386",
                                "nickname": "ACuyun",
                                "_code": "GUA-398-pPV",
                                "created_at": "2018-06-12 02:55:47",
                                "updated_at": "2018-06-12 02:55:47",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 585,
                                "matricula": "2318",
                                "name": "MUÑOZ HERNANDEZ HECTOR",
                                "email": "hhernandez431@gmail.com",
                                "telefono": "50499954233",
                                "nickname": "Tito",
                                "_code": "HON-767-0wM",
                                "created_at": "2018-06-12 02:58:30",
                                "updated_at": "2018-06-12 02:58:30",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 586,
                                "matricula": "17084",
                                "name": "Rocio Maricela Cabrera Catalán",
                                "email": "romacabrera@gmail.com",
                                "telefono": "3029-7445",
                                "nickname": "Rocio",
                                "_code": "GUA-654-i9E",
                                "created_at": "2018-06-12 03:03:25",
                                "updated_at": "2018-06-30 08:48:52",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 587,
                                "matricula": "10673",
                                "name": "GALINDO JUAREZ MOISES HUMBERTO",
                                "email": "mogalju@hotmail.com",
                                "telefono": "58026037",
                                "nickname": "drmoito",
                                "_code": "GUA-629-31X",
                                "created_at": "2018-06-12 03:07:55",
                                "updated_at": "2018-06-12 03:07:55",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 588,
                                "matricula": "9051",
                                "name": "SERAROLS JUAN CARLOS",
                                "email": "jcsv1974@yahoo.com",
                                "telefono": "7579-6025",
                                "nickname": "Juan",
                                "_code": "SAL-724-WO9",
                                "created_at": "2018-06-12 03:22:13",
                                "updated_at": "2018-06-12 03:22:13",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 589,
                                "matricula": "10375",
                                "name": "Maricela jackeline lopez hernandez",
                                "email": "dra.lopezmaricela@hotmail.com",
                                "telefono": "98761040",
                                "nickname": "Mary",
                                "_code": "HON-042-Df6",
                                "created_at": "2018-06-12 03:31:26",
                                "updated_at": "2018-06-12 03:31:26",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 590,
                                "matricula": "13308",
                                "name": "CIFUENTES VELASCO OMAR",
                                "email": "dr_cifuentes@yahoo.com",
                                "telefono": "55294247",
                                "nickname": "Gatorno",
                                "_code": "GUA-449-enN",
                                "created_at": "2018-06-12 03:31:46",
                                "updated_at": "2018-06-20 02:52:06",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 591,
                                "matricula": "16867",
                                "name": "Juan Diego Díaz Miranda",
                                "email": "pediareujuandiego@gmail.com",
                                "telefono": "34504257",
                                "nickname": "pediareu",
                                "_code": "GUA-120-M8j",
                                "created_at": "2018-06-12 03:37:49",
                                "updated_at": "2018-06-12 03:37:49",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 592,
                                "matricula": "13308",
                                "name": "CIFUENTES VELASCO OMAR",
                                "email": "conlamirada@hotmail.com",
                                "telefono": "55294247",
                                "nickname": "Gatorno",
                                "_code": "GUA-125-rQf",
                                "created_at": "2018-06-12 03:41:36",
                                "updated_at": "2018-06-12 03:41:36",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 593,
                                "matricula": "6648",
                                "name": "ATTILI YANES CESARE ARTURO",
                                "email": "cesareattili@ufm.edu",
                                "telefono": "55507585",
                                "nickname": "Cattili",
                                "_code": "GUA-759-E42",
                                "created_at": "2018-06-12 03:51:31",
                                "updated_at": "2018-06-12 03:51:31",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 594,
                                "matricula": "2812123",
                                "name": "BARDALES ARGOTE ABDI JOSUE",
                                "email": "abdibardales@gmail.com",
                                "telefono": "33637148",
                                "nickname": "Abdibar",
                                "_code": "HON-965-Y3s",
                                "created_at": "2018-06-12 04:09:19",
                                "updated_at": "2018-06-12 04:09:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 595,
                                "matricula": "8277",
                                "name": "MEDA ALVAREZ ADAN OTONIEL",
                                "email": "adanmeda@gmail.com",
                                "telefono": "42187854",
                                "nickname": "Meda20",
                                "_code": "GUA-847-WJD",
                                "created_at": "2018-06-12 04:23:41",
                                "updated_at": "2018-06-12 04:23:41",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 596,
                                "matricula": "6471",
                                "name": "LOPEZ MARTINEZ AMILCAR",
                                "email": "adriannalopez2004@gmail.com",
                                "telefono": "50175171",
                                "nickname": "Adrianna",
                                "_code": "GUA-720-bE2",
                                "created_at": "2018-06-12 04:24:02",
                                "updated_at": "2018-06-12 04:24:02",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 597,
                                "matricula": "2485",
                                "name": "Luis Humberto Gaytan Mendoza",
                                "email": "lugame_8@hotmail.com",
                                "telefono": "43738407",
                                "nickname": "Messi",
                                "_code": "GUA-780-JKF",
                                "created_at": "2018-06-12 04:36:04",
                                "updated_at": "2018-06-30 01:49:42",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 598,
                                "matricula": "8002",
                                "name": "Irela María Olivas Sanchez",
                                "email": "irela_olivas@hotmail.com",
                                "telefono": "88804326",
                                "nickname": "Irelaolivas",
                                "_code": "NIC-928-nr4",
                                "created_at": "2018-06-12 05:08:17",
                                "updated_at": "2018-06-12 05:08:17",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 599,
                                "matricula": "2389",
                                "name": "ALDANA ARITA JUANA MARIA",
                                "email": "jaldanaarita@gmail.com",
                                "telefono": "98841897",
                                "nickname": "Juana",
                                "_code": "HON-949-XTu",
                                "created_at": "2018-06-12 05:11:03",
                                "updated_at": "2018-06-12 05:11:03",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 600,
                                "matricula": "2608831642",
                                "name": "Luis Gustavo Amaya",
                                "email": "luisamaya10@hotmail.com",
                                "telefono": "99671957",
                                "nickname": "Tavo Amaya",
                                "_code": "HON-763-Vk5",
                                "created_at": "2018-06-12 05:13:19",
                                "updated_at": "2018-06-12 05:13:19",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 601,
                                "matricula": "8348",
                                "name": "TURCIOS DE LEON ADOLFO GUILLERMO",
                                "email": "dr_adolfoturcios@yahoo.com",
                                "telefono": "42173936",
                                "nickname": "ADOLFO GUILLERMO TURCIOS DE LEON",
                                "_code": "GUA-091-EvD",
                                "created_at": "2018-06-12 05:13:39",
                                "updated_at": "2018-06-12 05:13:39",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 602,
                                "matricula": "14222",
                                "name": "CHUC RAMIREZ EDDY JOEL",
                                "email": "ejcramirez@yahoo.com",
                                "telefono": "40197600",
                                "nickname": "Chuky",
                                "_code": "GUA-356-S1P",
                                "created_at": "2018-06-12 05:17:38",
                                "updated_at": "2018-06-26 17:15:44",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 603,
                                "matricula": "16780",
                                "name": "Hansell Fred de paz",
                                "email": "hdepaz54@hotmail.com",
                                "telefono": "42157029",
                                "nickname": "hansell",
                                "_code": "GUA-646-T4H",
                                "created_at": "2018-06-12 05:32:43",
                                "updated_at": "2018-06-12 05:32:43",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 604,
                                "matricula": "12213",
                                "name": "Marlen Merccedes Portillo Lopez",
                                "email": "marlenportillo_20@yahoo.com",
                                "telefono": "33646919",
                                "nickname": "Cheye",
                                "_code": "HON-046-Ma5",
                                "created_at": "2018-06-12 05:50:24",
                                "updated_at": "2018-06-12 05:50:24",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 605,
                                "matricula": "24790",
                                "name": "AGUILAR BLANCO ARIEL",
                                "email": "aguilarblanco@hotmail.com",
                                "telefono": "505-88516881",
                                "nickname": "quintogalactico",
                                "_code": "NIC-608-q9n",
                                "created_at": "2018-06-12 05:50:34",
                                "updated_at": "2018-06-12 05:50:34",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 606,
                                "matricula": "8237",
                                "name": "MUÑOZ GOMEZ DE SCHOENFELD ILIANA LISETH",
                                "email": "axis6464@gmail.com",
                                "telefono": "30084578",
                                "nickname": "Lis",
                                "_code": "GUA-432-KTH",
                                "created_at": "2018-06-12 05:51:47",
                                "updated_at": "2018-06-12 05:51:47",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 607,
                                "matricula": "17999",
                                "name": "Yessenia Marysabel Cortez Sic",
                                "email": "yencorsi@gmail.com",
                                "telefono": "50164022",
                                "nickname": "yessecortez",
                                "_code": "GUA-072-8Fr",
                                "created_at": "2018-06-12 05:54:34",
                                "updated_at": "2018-06-12 05:54:34",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 608,
                                "matricula": "-1",
                                "name": "Irene",
                                "email": "imarenco@hotmail.com",
                                "telefono": "00(505)86161262",
                                "nickname": "Marenco",
                                "_code": "NIC-158-6Dv",
                                "created_at": "2018-06-12 05:56:04",
                                "updated_at": "2018-06-12 05:56:04",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 609,
                                "matricula": "6487",
                                "name": "FIGUEROA VILLEDA DE LOBOS ESLY MERCEDES",
                                "email": "eslyfi50@gmail.com",
                                "telefono": "57096054",
                                "nickname": "EslyF",
                                "_code": "GUA-828-Mbn",
                                "created_at": "2018-06-12 05:56:42",
                                "updated_at": "2018-06-12 05:56:42",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 610,
                                "matricula": "4321",
                                "name": "HIDALGO CORRALES MARIA ISABEL",
                                "email": "giancarlohwu@gmail.com",
                                "telefono": "83848532",
                                "nickname": "Isa",
                                "_code": "COR-204-TTi",
                                "created_at": "2018-06-12 06:09:57",
                                "updated_at": "2018-06-12 06:09:57",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 611,
                                "matricula": "8478",
                                "name": "MARTINEZ CASTILLO DE HERNANDEZ LISBETH JANETE",
                                "email": "laejlhm@hotmail.com",
                                "telefono": "32273893",
                                "nickname": "Lisbetia",
                                "_code": "GUA-136-Tiv",
                                "created_at": "2018-06-12 06:13:01",
                                "updated_at": "2018-06-12 06:13:01",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 612,
                                "matricula": "9742",
                                "name": "Carla Yalile Reyes de Espino",
                                "email": "lespino67@gmail.com",
                                "telefono": "78542587",
                                "nickname": "Carla",
                                "_code": "SAL-748-71K",
                                "created_at": "2018-06-12 06:19:59",
                                "updated_at": "2018-07-06 06:16:00",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 613,
                                "matricula": "7277",
                                "name": "MOLINA MUÑIZ HECTOR GUILLERMO",
                                "email": "cedolguatemala@gmail.com",
                                "telefono": "23857700",
                                "nickname": "Doctor Dolor GUA",
                                "_code": "GUA-952-V0A",
                                "created_at": "2018-06-12 06:26:45",
                                "updated_at": "2018-07-10 03:50:48",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 614,
                                "matricula": "48645",
                                "name": "Norma Solis Gutierrez",
                                "email": "luis.bustamantesolis@gmail.com",
                                "telefono": "88697810",
                                "nickname": "NORMY",
                                "_code": "NIC-079-aeD",
                                "created_at": "2018-06-12 06:40:44",
                                "updated_at": "2018-06-12 06:40:44",
                                "puntos": 14
                            }
                        },
                        {
                            "user": {
                                "id": 615,
                                "matricula": "7170",
                                "name": "CANCINOS SASO JULIO ROLANDO",
                                "email": "jrcancinos@gmail.com",
                                "telefono": "57091020",
                                "nickname": "Roly",
                                "_code": "GUA-566-dYe",
                                "created_at": "2018-06-12 06:46:03",
                                "updated_at": "2018-06-12 06:46:03",
                                "puntos": 135
                            }
                        },
                        {
                            "user": {
                                "id": 616,
                                "matricula": "8968",
                                "name": "Albina Rivera",
                                "email": "albinarivera@gmail.com",
                                "telefono": "42206006",
                                "nickname": "Albina rivera",
                                "_code": "GUA-236-63r",
                                "created_at": "2018-06-12 06:51:34",
                                "updated_at": "2018-06-12 06:51:34",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 617,
                                "matricula": "4571",
                                "name": "CORTAVE CANIZALES MARIO HUGO",
                                "email": "mariocortave@yahoo.com",
                                "telefono": "55270471",
                                "nickname": "Hugo",
                                "_code": "GUA-643-53g",
                                "created_at": "2018-06-12 07:03:16",
                                "updated_at": "2018-06-12 07:03:16",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 618,
                                "matricula": "8276",
                                "name": "Lester Jose Coello Lopez",
                                "email": "lester8276coello@hotmail.com",
                                "telefono": "95673688",
                                "nickname": "neurochick",
                                "_code": "HON-545-7bv",
                                "created_at": "2018-06-12 07:20:32",
                                "updated_at": "2018-06-12 07:20:32",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 619,
                                "matricula": "17703",
                                "name": "URROZ MADRIZ MARCELA EUNICE",
                                "email": "murrozm@gmail.com",
                                "telefono": "88985947",
                                "nickname": "Barbie",
                                "_code": "NIC-279-KQO",
                                "created_at": "2018-06-12 07:39:02",
                                "updated_at": "2018-06-12 07:39:02",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 620,
                                "matricula": "151989",
                                "name": "Cristal Belleny Navarrete Rodriguez",
                                "email": "cri11_89@hotmail.com",
                                "telefono": "71189004",
                                "nickname": "Cri",
                                "_code": "SAL-587-CKE",
                                "created_at": "2018-06-12 07:46:46",
                                "updated_at": "2018-06-12 07:46:46",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 621,
                                "matricula": "14552",
                                "name": "ZACARIAS CASTRO CARLOS ESTUARDO",
                                "email": "carlosestuardozacarias@hotmail.com",
                                "telefono": "42250710",
                                "nickname": "Carlos Zacarias",
                                "_code": "GUA-045-e6j",
                                "created_at": "2018-06-12 07:55:19",
                                "updated_at": "2018-06-12 07:55:19",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 622,
                                "matricula": "22172",
                                "name": "Edgar Antón",
                                "email": "edgaranton79@hotmail.com",
                                "telefono": "89325669",
                                "nickname": "Edgaranton79",
                                "_code": "NIC-030-Bdx",
                                "created_at": "2018-06-12 08:08:22",
                                "updated_at": "2018-06-12 08:08:22",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 623,
                                "matricula": "3260",
                                "name": "ANGEL RAFAEL AGUILAR MARROQUIN",
                                "email": "angelrafael.aguilar@yahoo.com",
                                "telefono": "42926522",
                                "nickname": "Anel",
                                "_code": "GUA-627-vle",
                                "created_at": "2018-06-12 08:16:39",
                                "updated_at": "2018-06-12 08:16:39",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 624,
                                "matricula": "15562",
                                "name": "CECLILIA ELIZABETH VALDES CORTEZ",
                                "email": "mvaldesrecinos@jmail.com",
                                "telefono": "78063709",
                                "nickname": "CecyVal",
                                "_code": "SAL-848-5kd",
                                "created_at": "2018-06-12 08:19:57",
                                "updated_at": "2018-06-12 08:19:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 625,
                                "matricula": "3562",
                                "name": "VILLATORO BENITEZ EDGAR FERNANDO",
                                "email": "edfervb@gmail.com",
                                "telefono": "52015313",
                                "nickname": "EFERVIBE",
                                "_code": "GUA-799-Ymc",
                                "created_at": "2018-06-12 08:21:54",
                                "updated_at": "2018-06-12 08:21:54",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 626,
                                "matricula": "5197",
                                "name": "Alvares CISTEROS Evelyn",
                                "email": "dra.evelynalvarezcisneros@gmail.com",
                                "telefono": "89279313",
                                "nickname": "Eve",
                                "_code": "COR-394-zS5",
                                "created_at": "2018-06-12 08:39:15",
                                "updated_at": "2018-06-12 08:39:15",
                                "puntos": 55
                            }
                        },
                        {
                            "user": {
                                "id": 627,
                                "matricula": "21507149",
                                "name": "Barahona Florencia",
                                "email": "fmbfo1984@gmail.com",
                                "telefono": "88794092",
                                "nickname": "Flor",
                                "_code": "HON-112-V2z",
                                "created_at": "2018-06-12 08:56:03",
                                "updated_at": "2018-06-12 08:56:03",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 628,
                                "matricula": "7101",
                                "name": "PUR PEÑA, LUIS ALBERTO",
                                "email": "doclapp@hotmail.com",
                                "telefono": "52014234",
                                "nickname": "doclapp",
                                "_code": "GUA-462-WdI",
                                "created_at": "2018-06-12 09:35:50",
                                "updated_at": "2018-06-12 09:35:50",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 629,
                                "matricula": "7101",
                                "name": "PUR PEÑA, LUIS ALBERTO",
                                "email": "karenp180@gmail.com",
                                "telefono": "52014234",
                                "nickname": "doclapp",
                                "_code": "GUA-841-bKe",
                                "created_at": "2018-06-12 09:49:44",
                                "updated_at": "2018-06-12 09:49:44",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 630,
                                "matricula": "10178",
                                "name": "Carlos Andres Peralta Padilla",
                                "email": "carlospera33.cp@gmail.com",
                                "telefono": "94780279",
                                "nickname": "Pera",
                                "_code": "HON-470-M3T",
                                "created_at": "2018-06-12 11:17:55",
                                "updated_at": "2018-06-12 11:17:55",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 631,
                                "matricula": "17576",
                                "name": "Pamela gonzalez",
                                "email": "pamelasaraigonzalez@gmail.com",
                                "telefono": "44719754",
                                "nickname": "Pame",
                                "_code": "GUA-764-Nwl",
                                "created_at": "2018-06-12 18:01:53",
                                "updated_at": "2018-06-12 18:01:53",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 632,
                                "matricula": "9619",
                                "name": "ALVARADO DE GAMARRO ANA CAROLA",
                                "email": "clinicadra.degamarro@gmail.com",
                                "telefono": "55125292",
                                "nickname": "Carolita",
                                "_code": "GUA-203-AfP",
                                "created_at": "2018-06-12 18:10:12",
                                "updated_at": "2018-06-12 18:10:12",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 633,
                                "matricula": "15540",
                                "name": "TORRES HENRIQUEZ JORGE LUIS",
                                "email": "drojorgeluistorres@hotmail.com",
                                "telefono": "41368235",
                                "nickname": "Jorgito",
                                "_code": "GUA-143-lgU",
                                "created_at": "2018-06-12 18:10:30",
                                "updated_at": "2018-06-12 18:10:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 634,
                                "matricula": "15300",
                                "name": "Pavel",
                                "email": "leocn78@gmail.com",
                                "telefono": "53618841",
                                "nickname": "leo78",
                                "_code": "GUA-710-jjo",
                                "created_at": "2018-06-12 18:12:20",
                                "updated_at": "2018-06-12 18:12:20",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 635,
                                "matricula": "13260",
                                "name": "MICHEO CINTHYA LORENA",
                                "email": "lorenamicheo@gmail.com",
                                "telefono": "57102398",
                                "nickname": "Cylor",
                                "_code": "GUA-367-iYa",
                                "created_at": "2018-06-12 18:13:32",
                                "updated_at": "2018-06-12 18:13:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 636,
                                "matricula": "16861",
                                "name": "RAMOS EDUARDO",
                                "email": "drferamos@gmail.com",
                                "telefono": "78546120",
                                "nickname": "Stereo Mcs",
                                "_code": "SAL-307-Dut",
                                "created_at": "2018-06-12 18:16:01",
                                "updated_at": "2018-06-12 18:16:01",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 637,
                                "matricula": "17111",
                                "name": "Ramon Antonio",
                                "email": "ramonantoniozavala8@gmail.com",
                                "telefono": "71275757",
                                "nickname": "Ramon Zavala",
                                "_code": "SAL-266-P5Y",
                                "created_at": "2018-06-12 18:27:03",
                                "updated_at": "2018-06-12 18:27:03",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 638,
                                "matricula": "16691",
                                "name": "SAMAYOA JUAN PABLO",
                                "email": "jpsamayoa@hotmail.com",
                                "telefono": "30654763",
                                "nickname": "juanpa",
                                "_code": "GUA-513-fSN",
                                "created_at": "2018-06-12 18:31:22",
                                "updated_at": "2018-06-12 18:31:22",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 639,
                                "matricula": "5091",
                                "name": "CARRAZCO NUÑEZ PEDRO EDGARDO",
                                "email": "drpcarrasco@hotmail.com",
                                "telefono": "96188865",
                                "nickname": "Pet2018",
                                "_code": "HON-746-fsf",
                                "created_at": "2018-06-12 18:36:32",
                                "updated_at": "2018-06-12 18:36:32",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 640,
                                "matricula": "11847",
                                "name": "RODAS BARRIOS RODOLFO ENRIQUE",
                                "email": "rodenri7@gmail.com",
                                "telefono": "59665781",
                                "nickname": "Chofo",
                                "_code": "GUA-241-zcr",
                                "created_at": "2018-06-12 18:39:16",
                                "updated_at": "2018-06-12 18:39:16",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 641,
                                "matricula": "11539",
                                "name": "Jose Ignacio Ballestero Solano",
                                "email": "jibas@hotmail.com",
                                "telefono": "88903366",
                                "nickname": "jibas",
                                "_code": "COR-177-zOu",
                                "created_at": "2018-06-12 19:30:33",
                                "updated_at": "2018-06-12 19:30:33",
                                "puntos": 63
                            }
                        },
                        {
                            "user": {
                                "id": 642,
                                "matricula": "10509",
                                "name": "LOPEZ VILLATORO JOSE ROLANDO",
                                "email": "jr_lopez02@yahoo.es",
                                "telefono": "53443376",
                                "nickname": "JRLOPEZ",
                                "_code": "GUA-579-9oU",
                                "created_at": "2018-06-12 19:51:21",
                                "updated_at": "2018-06-12 19:51:21",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 643,
                                "matricula": "1724",
                                "name": "KOGEL HUGNES STEVEN",
                                "email": "stevenkogel@gmail.com",
                                "telefono": "8388-4940",
                                "nickname": "Steve",
                                "_code": "COR-140-z3Z",
                                "created_at": "2018-06-12 19:51:59",
                                "updated_at": "2018-06-12 19:51:59",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 644,
                                "matricula": "13347",
                                "name": "LACAYO RONQUILLO ANA LUCIA",
                                "email": "analucialacayo@gmail.com",
                                "telefono": "5699 3033",
                                "nickname": "AnaLu",
                                "_code": "GUA-442-W3u",
                                "created_at": "2018-06-12 20:02:55",
                                "updated_at": "2018-06-12 20:02:55",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 645,
                                "matricula": "50043",
                                "name": "Bismark Antonio  García Sanchez",
                                "email": "bagshn@gmail.com",
                                "telefono": "78424587",
                                "nickname": "Bags",
                                "_code": "NIC-110-rFT",
                                "created_at": "2018-06-12 20:08:38",
                                "updated_at": "2018-06-12 20:08:38",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 646,
                                "matricula": "6958",
                                "name": "NO NAME - NEW USER",
                                "email": "alfadoc@gim.com",
                                "telefono": "78281657",
                                "nickname": "Mauricio Alfaro Gonzalez",
                                "_code": "SAL-700-QHq",
                                "created_at": "2018-06-12 20:09:56",
                                "updated_at": "2018-06-12 20:09:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 647,
                                "matricula": "10371",
                                "name": "LOPEZ MUÑOZ LILIAM YOLANDA",
                                "email": "llopezhn@yahoo.es",
                                "telefono": "95888739",
                                "nickname": "Pili",
                                "_code": "HON-971-b0W",
                                "created_at": "2018-06-12 20:11:55",
                                "updated_at": "2018-07-10 03:19:44",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 648,
                                "matricula": "48859",
                                "name": "Jorge Luis Carvajal Mora",
                                "email": "jcarvajal_2706@yahoo.com",
                                "telefono": "76686354",
                                "nickname": "jcarvajal-2706",
                                "_code": "NIC-067-2YQ",
                                "created_at": "2018-06-12 20:13:34",
                                "updated_at": "2018-06-12 20:13:34",
                                "puntos": 29
                            }
                        },
                        {
                            "user": {
                                "id": 649,
                                "matricula": "6022",
                                "name": "LOPEZ DE SAGASTUME IRMA LETICIA",
                                "email": "irmalledes@hotmail.com",
                                "telefono": "47027514",
                                "nickname": "Irma",
                                "_code": "GUA-102-LOz",
                                "created_at": "2018-06-12 20:15:32",
                                "updated_at": "2018-06-12 20:15:32",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 650,
                                "matricula": "1707",
                                "name": "RODAS LOPEZ VICTOR MANUEL",
                                "email": "vimaro2620@hotmail.com",
                                "telefono": "7763-6167",
                                "nickname": "vico",
                                "_code": "GUA-071-XSa",
                                "created_at": "2018-06-12 20:25:02",
                                "updated_at": "2018-06-12 20:25:02",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 651,
                                "matricula": "11946",
                                "name": "Jose Rigoberto Paz",
                                "email": "rigoph3190@hotmail.com",
                                "telefono": "99315509",
                                "nickname": "Jr paz",
                                "_code": "HON-368-NfT",
                                "created_at": "2018-06-12 21:00:13",
                                "updated_at": "2018-06-16 22:36:49",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 652,
                                "matricula": "52897",
                                "name": "Yader Flores",
                                "email": "yader3110@hotmail.com",
                                "telefono": "76185051",
                                "nickname": "Yader3110",
                                "_code": "NIC-136-p0q",
                                "created_at": "2018-06-12 21:12:23",
                                "updated_at": "2018-06-12 21:12:23",
                                "puntos": 30
                            }
                        },
                        {
                            "user": {
                                "id": 653,
                                "matricula": "11062",
                                "name": "ROSALES FAJARDO GILDA PATRICIA",
                                "email": "ricardorosales21@homail.com",
                                "telefono": "55100955",
                                "nickname": "gilda patricia rosales fajardo",
                                "_code": "GUA-608-fh5",
                                "created_at": "2018-06-12 21:12:24",
                                "updated_at": "2018-06-12 21:12:24",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 654,
                                "matricula": "9329",
                                "name": "SAAVEDRA MAYNOR",
                                "email": "mayvedra@gmail.com",
                                "telefono": "99859959",
                                "nickname": "Mayvedra",
                                "_code": "HON-690-MWx",
                                "created_at": "2018-06-12 21:12:30",
                                "updated_at": "2018-06-12 21:12:30",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 655,
                                "matricula": "10660",
                                "name": "Alba Fabiola Gomez Diaz",
                                "email": "fabby_dg87@hotmail.com",
                                "telefono": "33613897",
                                "nickname": "Fabby Gomez",
                                "_code": "HON-329-6zo",
                                "created_at": "2018-06-12 21:20:30",
                                "updated_at": "2018-06-12 21:20:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 656,
                                "matricula": "25849",
                                "name": "Gerald torrez",
                                "email": "gertoruiz@gmail.com",
                                "telefono": "78643390",
                                "nickname": "Gerladtuva",
                                "_code": "NIC-462-tOX",
                                "created_at": "2018-06-12 21:20:59",
                                "updated_at": "2018-06-12 21:20:59",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 657,
                                "matricula": "14741",
                                "name": "GONZALES SUCUQUI VELSY ANELI",
                                "email": "velsyaneli27@gmail.com",
                                "telefono": "55743533",
                                "nickname": "@neli",
                                "_code": "GUA-531-hnb",
                                "created_at": "2018-06-12 21:36:10",
                                "updated_at": "2018-06-14 03:08:50",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 658,
                                "matricula": "17201",
                                "name": "GOMEZ BRACAMONTES RAFAEL HUMBERTO",
                                "email": "rafaelbracamonte@me.com",
                                "telefono": "55293318",
                                "nickname": "Maxpowers11",
                                "_code": "GUA-703-Twi",
                                "created_at": "2018-06-12 21:38:17",
                                "updated_at": "2018-06-12 21:38:17",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 659,
                                "matricula": "7387",
                                "name": "AGUILAR RODRIGUEZ SONIA MARIBEL",
                                "email": "somariaguilar@gmail.com",
                                "telefono": "53061530",
                                "nickname": "Zeus",
                                "_code": "GUA-007-kRr",
                                "created_at": "2018-06-12 21:49:36",
                                "updated_at": "2018-06-12 21:49:36",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 660,
                                "matricula": "9830",
                                "name": "JORGE MAGARIÑO JUAREZ",
                                "email": "magarino1@gmail.com",
                                "telefono": "77563626",
                                "nickname": "JORGE",
                                "_code": "GUA-194-1mH",
                                "created_at": "2018-06-12 21:57:37",
                                "updated_at": "2018-06-12 21:57:37",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 661,
                                "matricula": "94",
                                "name": "Lisandro Roberto Moreira Chavarria",
                                "email": "pastorlisandro@yahoo.es",
                                "telefono": "88520682",
                                "nickname": "LIMORE",
                                "_code": "NIC-490-UCr",
                                "created_at": "2018-06-12 21:58:37",
                                "updated_at": "2018-06-12 21:58:37",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 662,
                                "matricula": "4608",
                                "name": "LACAYO MEZA EDMUNDO ROBERTO",
                                "email": "lacayomd@gmail.com",
                                "telefono": "77618751",
                                "nickname": "Lacayomd",
                                "_code": "Gua-990-wdt",
                                "created_at": "2018-06-12 22:01:04",
                                "updated_at": "2018-06-12 22:01:04",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 663,
                                "matricula": "6214",
                                "name": "ana lucrecia posadas de leon",
                                "email": "centroclinicojabes@yahoo.com",
                                "telefono": "41185214",
                                "nickname": "lucrecia posadas",
                                "_code": "GUA-990-cfk",
                                "created_at": "2018-06-12 22:03:07",
                                "updated_at": "2018-06-12 22:03:07",
                                "puntos": 29
                            }
                        },
                        {
                            "user": {
                                "id": 664,
                                "matricula": "11831",
                                "name": "Celenia Elizabeth Mira de Sanchez",
                                "email": "c.lizmira@gmail.com",
                                "telefono": "77447093",
                                "nickname": "Celen",
                                "_code": "SAL-878-g5X",
                                "created_at": "2018-06-12 22:06:16",
                                "updated_at": "2018-06-12 22:06:16",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 665,
                                "matricula": "7352",
                                "name": "ZAMBRANO NORMAN",
                                "email": "normanalbertoza@hotmail.com",
                                "telefono": "98086301",
                                "nickname": "NAZA",
                                "_code": "HON-612-Zo9",
                                "created_at": "2018-06-12 22:07:56",
                                "updated_at": "2018-06-12 22:07:56",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 666,
                                "matricula": "12665",
                                "name": "CATALAN ORELLANA NANCY CAROLINA",
                                "email": "drnancycatalan@gmail.com",
                                "telefono": "57091031",
                                "nickname": "Nancy",
                                "_code": "GUA-180-ygj",
                                "created_at": "2018-06-12 22:09:11",
                                "updated_at": "2018-06-12 22:09:11",
                                "puntos": 63
                            }
                        },
                        {
                            "user": {
                                "id": 667,
                                "matricula": "11023",
                                "name": "QUINTANA CORTEZ GLORIA AMANADA",
                                "email": "gloriaqco@hotmail.com",
                                "telefono": "88791467",
                                "nickname": "Gloria Quintana",
                                "_code": "Nic-747-3R5",
                                "created_at": "2018-06-12 22:10:19",
                                "updated_at": "2018-06-12 22:10:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 668,
                                "matricula": "7820",
                                "name": "FLORES FUENTES JOSE EDGARDO",
                                "email": "drjeff_go@yahoo.es",
                                "telefono": "78744396",
                                "nickname": "JEFF",
                                "_code": "SAL-495-Rus",
                                "created_at": "2018-06-12 22:12:19",
                                "updated_at": "2018-07-05 21:34:37",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 669,
                                "matricula": "4656",
                                "name": "NAVARRO MONTES ELMER AUGUSTO",
                                "email": "sargom66@gmail.com",
                                "telefono": "70106463",
                                "nickname": "Sargom",
                                "_code": "SAL-690-uL5",
                                "created_at": "2018-06-12 22:19:06",
                                "updated_at": "2018-06-12 22:19:06",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 670,
                                "matricula": "5571",
                                "name": "José manuel sandoval guerra",
                                "email": "rosarmy_28@hotmail.com",
                                "telefono": "78527790",
                                "nickname": "Dr. Sandoval",
                                "_code": "SAL-374-B4w",
                                "created_at": "2018-06-12 22:36:00",
                                "updated_at": "2018-06-12 22:36:00",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 671,
                                "matricula": "41582",
                                "name": "roxana calderon",
                                "email": "roxicalderon2412@hotmail.com",
                                "telefono": "85182635",
                                "nickname": "roxy",
                                "_code": "NIC-359-Utt",
                                "created_at": "2018-06-12 22:44:39",
                                "updated_at": "2018-06-12 22:44:39",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 672,
                                "matricula": "578",
                                "name": "Johan Antonio Castillo Martínez",
                                "email": "cjohanantonio1@yahoo.es",
                                "telefono": "87452509",
                                "nickname": "Jacm",
                                "_code": "NIC-578-YOu",
                                "created_at": "2018-06-12 22:48:40",
                                "updated_at": "2018-06-12 22:48:40",
                                "puntos": 62
                            }
                        },
                        {
                            "user": {
                                "id": 673,
                                "matricula": "12607",
                                "name": "TERCERO REAL JOSE DOUGLAS",
                                "email": "jodoterre@yahoo.es",
                                "telefono": "89827347",
                                "nickname": "Jodoterre",
                                "_code": "NIC-809-BaD",
                                "created_at": "2018-06-12 23:20:14",
                                "updated_at": "2018-06-13 23:28:19",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 674,
                                "matricula": "18628",
                                "name": "Gabriela Pereira",
                                "email": "gapc19@hotmail.com",
                                "telefono": "88194669",
                                "nickname": "Gaby",
                                "_code": "NIC-951-TwZ",
                                "created_at": "2018-06-12 23:21:57",
                                "updated_at": "2018-06-12 23:21:57",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 675,
                                "matricula": "11953",
                                "name": "Polanco Ruiz Eymi Pamela",
                                "email": "amylove_18@hotmail.com",
                                "telefono": "98402587",
                                "nickname": "Eymi",
                                "_code": "HON-405-44A",
                                "created_at": "2018-06-12 23:26:13",
                                "updated_at": "2018-06-12 23:26:13",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 676,
                                "matricula": "29812",
                                "name": "YURITZA VIDAURRE ALBERTO JAVIER",
                                "email": "albert101283@hotmail.com",
                                "telefono": "81464587",
                                "nickname": "Aljavier Chi",
                                "_code": "NIC-490-8rs",
                                "created_at": "2018-06-12 23:28:31",
                                "updated_at": "2018-06-12 23:28:31",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 677,
                                "matricula": "11062",
                                "name": "ROSALES FAJARDO GILDA PATRICIA",
                                "email": "rosalesaldair05@gmail.com",
                                "telefono": "40182138",
                                "nickname": "Gilda Rosales",
                                "_code": "GUA-628-Hhp",
                                "created_at": "2018-06-12 23:30:06",
                                "updated_at": "2018-07-05 03:02:31",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 678,
                                "matricula": "6001",
                                "name": "Fredy Antonio Mendoza",
                                "email": "menfredy@hotmail.com",
                                "telefono": "31900631",
                                "nickname": "menfredy",
                                "_code": "HON-607-lTQ",
                                "created_at": "2018-06-12 23:30:26",
                                "updated_at": "2018-06-12 23:30:26",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 679,
                                "matricula": "23809",
                                "name": "MEJIA LOPEZ MARIELA CONCEPCION",
                                "email": "matamari230781@yahoo.es",
                                "telefono": "83697115",
                                "nickname": "Dra M",
                                "_code": "Nic-579-tMR",
                                "created_at": "2018-06-12 23:34:01",
                                "updated_at": "2018-06-29 04:26:27",
                                "puntos": 35
                            }
                        },
                        {
                            "user": {
                                "id": 680,
                                "matricula": "6800",
                                "name": "Fiorella Segura Villalobos",
                                "email": "marcejones@hotmail.com",
                                "telefono": "22345511",
                                "nickname": "Fio",
                                "_code": "COR-291-bCg",
                                "created_at": "2018-06-12 23:45:36",
                                "updated_at": "2018-06-12 23:45:36",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 681,
                                "matricula": "5962",
                                "name": "MONTOYA DIAMANTINA KARLA",
                                "email": "karlamontoyav@hotmail.com",
                                "telefono": "99553778",
                                "nickname": "Kmontoya",
                                "_code": "HON-527-Fpf",
                                "created_at": "2018-06-12 23:47:19",
                                "updated_at": "2018-06-12 23:47:19",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 682,
                                "matricula": "12514",
                                "name": "OCHAITA  VILLATORO JORGE ERNESTO",
                                "email": "boye72@hotmail.com",
                                "telefono": "58682311",
                                "nickname": "Neto",
                                "_code": "GUA-417-Dct",
                                "created_at": "2018-06-12 23:49:49",
                                "updated_at": "2018-06-12 23:49:49",
                                "puntos": 66
                            }
                        },
                        {
                            "user": {
                                "id": 683,
                                "matricula": "12718",
                                "name": "Carlos Enrique  Aleman",
                                "email": "alexandroea2013@gmail.com",
                                "telefono": "(504) 33199953",
                                "nickname": "Dr.aleman13",
                                "_code": "HON-876-Ufs",
                                "created_at": "2018-06-12 23:55:17",
                                "updated_at": "2018-06-12 23:55:17",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 684,
                                "matricula": "15963",
                                "name": "William René Aquino Díaz",
                                "email": "draquinod@gmail.com",
                                "telefono": "57199295",
                                "nickname": "Willy",
                                "_code": "GUA-609-rlh",
                                "created_at": "2018-06-12 23:56:24",
                                "updated_at": "2018-06-12 23:56:24",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 685,
                                "matricula": "4471",
                                "name": "CHAVES CASTRO NURIA",
                                "email": "nuriachaves@costarricense.cr",
                                "telefono": "83943675",
                                "nickname": "nuriachaves",
                                "_code": "COR-531-2Oi",
                                "created_at": "2018-06-12 23:58:00",
                                "updated_at": "2018-06-12 23:58:00",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 686,
                                "matricula": "9998",
                                "name": "norman vanedin martinez hernandez",
                                "email": "normanv2184@hotmail.com",
                                "telefono": "96015483",
                                "nickname": "newmen",
                                "_code": "hon-380-yum",
                                "created_at": "2018-06-13 00:00:06",
                                "updated_at": "2018-06-13 00:00:06",
                                "puntos": 35
                            }
                        },
                        {
                            "user": {
                                "id": 687,
                                "matricula": "1699",
                                "name": "Jorge Luis",
                                "email": "jlmairena@yahoo.es",
                                "telefono": "88566813",
                                "nickname": "Jorge",
                                "_code": "NIC-987-tSi",
                                "created_at": "2018-06-13 00:02:15",
                                "updated_at": "2018-06-13 00:02:15",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 688,
                                "matricula": "5193",
                                "name": "FRANCIS DE FATIMA ESCORCIA DE LAMBOUR",
                                "email": "ffescorcia@yahoo.com.mx",
                                "telefono": "41898487",
                                "nickname": "Francis",
                                "_code": "GUA-876-4O0",
                                "created_at": "2018-06-13 00:13:06",
                                "updated_at": "2018-06-13 00:13:06",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 689,
                                "matricula": "12633",
                                "name": "Guardado Irías Jorge Roberto",
                                "email": "jrg0016@gmail.com",
                                "telefono": "94975869",
                                "nickname": "jrg0016",
                                "_code": "HON-472-248",
                                "created_at": "2018-06-13 00:28:27",
                                "updated_at": "2018-06-13 00:28:27",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 690,
                                "matricula": "211",
                                "name": "Yustin",
                                "email": "canrosy_72@hotmail.com",
                                "telefono": "84361450",
                                "nickname": "Yus",
                                "_code": "NIC-211-9qb",
                                "created_at": "2018-06-13 00:29:18",
                                "updated_at": "2018-06-13 00:29:18",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 691,
                                "matricula": "52800",
                                "name": "NO NAME - NEW USER",
                                "email": "mariamjohana9@gmail.com",
                                "telefono": "89785129",
                                "nickname": "DraMariam",
                                "_code": "NIC-793-oyG",
                                "created_at": "2018-06-13 00:29:24",
                                "updated_at": "2018-06-13 00:29:24",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 692,
                                "matricula": "17417",
                                "name": "Fernando José Pérez Urbina",
                                "email": "katherinnepereez@gmail.com",
                                "telefono": "87615382",
                                "nickname": "drpérez58",
                                "_code": "NIC-176-tvp",
                                "created_at": "2018-06-13 00:30:23",
                                "updated_at": "2018-06-13 00:30:23",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 693,
                                "matricula": "12717",
                                "name": "RUEDA MONTOYA VANESSA JAMILETH",
                                "email": "clinicamedicaangeles2018@gmail.com",
                                "telefono": "(504) 88575949",
                                "nickname": "Dra.Rueda",
                                "_code": "HON-451-D75",
                                "created_at": "2018-06-13 00:32:45",
                                "updated_at": "2018-06-13 00:32:45",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 694,
                                "matricula": "13433",
                                "name": "Luz Bolaños",
                                "email": "danydvallem@yahoo.com",
                                "telefono": "40278052",
                                "nickname": "Luz",
                                "_code": "GUA-088-flx",
                                "created_at": "2018-06-13 00:37:04",
                                "updated_at": "2018-06-13 00:37:04",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 695,
                                "matricula": "1733",
                                "name": "JIMENEZ MARTEN FRANCISCO J.",
                                "email": "frajima53@gmail.com",
                                "telefono": "83844951",
                                "nickname": "Pepe",
                                "_code": "COR-780-voK",
                                "created_at": "2018-06-13 00:41:44",
                                "updated_at": "2018-06-13 00:41:44",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 696,
                                "matricula": "9810",
                                "name": "Alejandra María Garcia",
                                "email": "garfu0703@hotmail.com",
                                "telefono": "95638998",
                                "nickname": "Garfu",
                                "_code": "HON-890-G9b",
                                "created_at": "2018-06-13 00:57:21",
                                "updated_at": "2018-06-13 00:57:21",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 697,
                                "matricula": "9133",
                                "name": "PEREDA CAMAS LUIS EDUARDO",
                                "email": "drperedac@gmail.com",
                                "telefono": "59453478",
                                "nickname": "ok",
                                "_code": "GUA-872-bZ2",
                                "created_at": "2018-06-13 01:16:16",
                                "updated_at": "2018-06-13 01:16:16",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 698,
                                "matricula": "2198",
                                "name": "CANALES GARCIA SALVADOR EDUARDO",
                                "email": "salvadorcanales06@yahoo.com",
                                "telefono": "99923789",
                                "nickname": "big boy",
                                "_code": "HON-894-vCc",
                                "created_at": "2018-06-13 01:16:38",
                                "updated_at": "2018-06-13 01:16:38",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 699,
                                "matricula": "730",
                                "name": "MARTINEZ ZELAYA SALAVADOR ALBERTO",
                                "email": "salvador8800@hotmail.com",
                                "telefono": "99922942",
                                "nickname": "VAYOY",
                                "_code": "HON-431-PA2",
                                "created_at": "2018-06-13 01:21:37",
                                "updated_at": "2018-06-13 01:21:37",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 701,
                                "matricula": "6499",
                                "name": "ESPINOZA PALACIOS SHARON MARCELA",
                                "email": "sharonespinozap@yahoo.com",
                                "telefono": "8766-2201",
                                "nickname": "Sharon",
                                "_code": "HON-612-ZqW",
                                "created_at": "2018-06-13 01:23:48",
                                "updated_at": "2018-06-13 01:23:48",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 702,
                                "matricula": "6465",
                                "name": "Nancy Florencia García Martínez",
                                "email": "ladoc_26@hotmail.com",
                                "telefono": "88029009",
                                "nickname": "Nan",
                                "_code": "HON-023-fzc",
                                "created_at": "2018-06-13 01:26:01",
                                "updated_at": "2018-06-13 01:26:01",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 703,
                                "matricula": "6452",
                                "name": "QUIROZ RICARDO",
                                "email": "tiernitoquiroz77@hotmail.com",
                                "telefono": "99185199",
                                "nickname": "Ricardo Quiroz",
                                "_code": "HON-558-sFs",
                                "created_at": "2018-06-13 01:30:29",
                                "updated_at": "2018-06-29 05:24:48",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 704,
                                "matricula": "14371",
                                "name": "GUIDOS RICARDO",
                                "email": "rguidos@hotmail.com",
                                "telefono": "7840-8465",
                                "nickname": "rguidos",
                                "_code": "sal-938-k03",
                                "created_at": "2018-06-13 01:31:39",
                                "updated_at": "2018-06-13 01:31:39",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 705,
                                "matricula": "4758",
                                "name": "CERDAS LOPEZ HUGO JHONNY",
                                "email": "dr.cerdas@gmail.com",
                                "telefono": "87130558",
                                "nickname": "dr.cerdas@gmail.com",
                                "_code": "COR-920-uSm",
                                "created_at": "2018-06-13 01:34:34",
                                "updated_at": "2018-06-13 01:34:34",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 706,
                                "matricula": "3815",
                                "name": "ALMENGOR SANCHEZ JOSE EDUARDO",
                                "email": "dr.almengor@hotmail.com",
                                "telefono": "77769884",
                                "nickname": "Dr.almengor",
                                "_code": "GUA-149-0N8",
                                "created_at": "2018-06-13 01:38:26",
                                "updated_at": "2018-06-13 01:38:26",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 707,
                                "matricula": "8313",
                                "name": "HENRIQUEZ PINEDA MARIO RENE",
                                "email": "mario.mrhp@hotmail.com",
                                "telefono": "98100595",
                                "nickname": "pato",
                                "_code": "HON-359-EMA",
                                "created_at": "2018-06-13 01:57:20",
                                "updated_at": "2018-06-13 01:57:20",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 708,
                                "matricula": "14975",
                                "name": "Hendrick Alfaro Guerrero",
                                "email": "hendrick014@gmail.com",
                                "telefono": "88942083",
                                "nickname": "Hendrick",
                                "_code": "COR-376-U0n",
                                "created_at": "2018-06-13 02:04:35",
                                "updated_at": "2018-06-13 02:04:35",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 709,
                                "matricula": "230107",
                                "name": "Emilio Molina",
                                "email": "drjackmolina@yahoo.com",
                                "telefono": "99938133",
                                "nickname": "Jack",
                                "_code": "Hon-807-58b",
                                "created_at": "2018-06-13 02:08:45",
                                "updated_at": "2018-06-13 02:08:45",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 710,
                                "matricula": "13320",
                                "name": "HERRERA JOSE ANGEL",
                                "email": "drherrera2003@yahoo.com",
                                "telefono": "88346210",
                                "nickname": "dr",
                                "_code": "NIC-217-xdU",
                                "created_at": "2018-06-13 02:10:35",
                                "updated_at": "2018-06-13 02:10:35",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 711,
                                "matricula": "13444",
                                "name": "GARCIA MARTINEZ JOHN MAURICIO",
                                "email": "jmgarcia71@hotmail.com",
                                "telefono": "88878898",
                                "nickname": "Luna",
                                "_code": "NIC-373-v0f",
                                "created_at": "2018-06-13 02:11:02",
                                "updated_at": "2018-06-13 02:11:02",
                                "puntos": 57
                            }
                        },
                        {
                            "user": {
                                "id": 712,
                                "matricula": "24739",
                                "name": "Eden Antonio Díaz de la Rocha",
                                "email": "edlarocha21@yahoo.es",
                                "telefono": "83876557",
                                "nickname": "Edlarocha21",
                                "_code": "NIC-633-1YD",
                                "created_at": "2018-06-13 02:11:08",
                                "updated_at": "2018-06-13 02:11:08",
                                "puntos": 114
                            }
                        },
                        {
                            "user": {
                                "id": 713,
                                "matricula": "24739",
                                "name": "Eden Díaz",
                                "email": "edlarocha24@gmail.com",
                                "telefono": "83876557",
                                "nickname": "Caballon",
                                "_code": "NIC-813-9po",
                                "created_at": "2018-06-13 02:14:47",
                                "updated_at": "2018-06-13 02:14:47",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 714,
                                "matricula": "12202",
                                "name": "NAVARRETE RODRIGUEZ CARLOS ARMANDO",
                                "email": "carmanaro@yahoo.com.mx",
                                "telefono": "79713335",
                                "nickname": "Tortolito",
                                "_code": "SAL-655-VD9",
                                "created_at": "2018-06-13 02:18:55",
                                "updated_at": "2018-06-13 02:18:55",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 715,
                                "matricula": "10523",
                                "name": "MACHADO ESCOLERO JOSE ABDON",
                                "email": "mdabdonmachado@gmail.com",
                                "telefono": "78943198",
                                "nickname": "Mdabdonmachado",
                                "_code": "SAL-692-ut5",
                                "created_at": "2018-06-13 02:20:22",
                                "updated_at": "2018-06-13 02:20:22",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 716,
                                "matricula": "12965",
                                "name": "ADAY RAMIREZ PEDRO",
                                "email": "peteraday@hotmail.com",
                                "telefono": "53200120",
                                "nickname": "PETER",
                                "_code": "GUA-290-0iL",
                                "created_at": "2018-06-13 02:22:59",
                                "updated_at": "2018-06-13 02:22:59",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 717,
                                "matricula": "7355",
                                "name": "POLANCO BARRERA MILTON GIOVANNI",
                                "email": "mpolancobarrera@hotmail.com",
                                "telefono": "42244883",
                                "nickname": "Milton",
                                "_code": "GUA-901-Yee",
                                "created_at": "2018-06-13 02:29:10",
                                "updated_at": "2018-06-13 02:29:10",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 718,
                                "matricula": "2739",
                                "name": "LOPEZ DURAN MARVIN ENRIQUE",
                                "email": "dr.marvinlopez1@gmail.com",
                                "telefono": "52015392",
                                "nickname": "marenlo",
                                "_code": "GUA-007-aLE",
                                "created_at": "2018-06-13 02:31:19",
                                "updated_at": "2018-06-13 02:31:19",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 719,
                                "matricula": "6932",
                                "name": "GALVEZ DAVID",
                                "email": "dgalvezhn@gmail.com",
                                "telefono": "99387974",
                                "nickname": "David",
                                "_code": "Hon-080-rOH",
                                "created_at": "2018-06-13 02:41:24",
                                "updated_at": "2018-06-13 22:44:03",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 720,
                                "matricula": "205005706",
                                "name": "Nelson Antonio Garza",
                                "email": "nagarza20@gmail.com",
                                "telefono": "99867792",
                                "nickname": "Real España F.C.",
                                "_code": "HON-267-rWr",
                                "created_at": "2018-06-13 02:54:56",
                                "updated_at": "2018-06-13 02:54:56",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 721,
                                "matricula": "14265",
                                "name": "ANA LUCIA LANGE",
                                "email": "analulange@gmail.com",
                                "telefono": "30659699",
                                "nickname": "ANA",
                                "_code": "GUA-536-JJ1",
                                "created_at": "2018-06-13 02:57:16",
                                "updated_at": "2018-06-13 02:57:16",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 722,
                                "matricula": "6329",
                                "name": "Sammy Alexis Ramirez Juarez",
                                "email": "sammana90@hotmail.com",
                                "telefono": "55182770",
                                "nickname": "Guaca2",
                                "_code": "GUA-463-M4w",
                                "created_at": "2018-06-13 02:58:12",
                                "updated_at": "2018-06-13 02:58:12",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 723,
                                "matricula": "13829",
                                "name": "Helena Carolina Zelaya Hernández",
                                "email": "helena.zelaya@gmail.com",
                                "telefono": "99329762",
                                "nickname": "Helena Zelaya",
                                "_code": "HON-098-Dpn",
                                "created_at": "2018-06-13 03:07:06",
                                "updated_at": "2018-06-13 03:07:06",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 724,
                                "matricula": "8274",
                                "name": "Darwin Alexander Maldonado Medina",
                                "email": "alexmed34@hotmail.com",
                                "telefono": "94672326",
                                "nickname": "Bocha",
                                "_code": "HON-763-qt7",
                                "created_at": "2018-06-13 03:10:16",
                                "updated_at": "2018-06-13 03:10:16",
                                "puntos": 49
                            }
                        },
                        {
                            "user": {
                                "id": 725,
                                "matricula": "10257",
                                "name": "SANTOS GUERRA CARLOS DAVID",
                                "email": "docsantosg@gmail.com",
                                "telefono": "57139697",
                                "nickname": "Calin",
                                "_code": "GUA-179-h41",
                                "created_at": "2018-06-13 03:11:40",
                                "updated_at": "2018-06-13 03:11:40",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 726,
                                "matricula": "15031",
                                "name": "Melissa Fuentes",
                                "email": "mejufumi@hotmail.com",
                                "telefono": "56922262",
                                "nickname": "Mel JFM",
                                "_code": "GUA-902-7zq",
                                "created_at": "2018-06-13 03:21:13",
                                "updated_at": "2018-06-16 16:10:19",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 727,
                                "matricula": "12223",
                                "name": "RODAS ANLEU BLANCA NINNETTE",
                                "email": "bnra7475@gmail.com",
                                "telefono": "54009920",
                                "nickname": "Blanira",
                                "_code": "GUA-742-6Nj",
                                "created_at": "2018-06-13 03:22:42",
                                "updated_at": "2018-06-13 03:22:42",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 728,
                                "matricula": "16047",
                                "name": "Gilmer Leonidas de León Garcia",
                                "email": "cahaboncito@yahoo.com",
                                "telefono": "54304090",
                                "nickname": "Gilmerleo",
                                "_code": "GUA-573-qqo",
                                "created_at": "2018-06-13 03:26:52",
                                "updated_at": "2018-06-13 03:26:52",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 729,
                                "matricula": "8531",
                                "name": "NOGUERA FRANCISCO JAVIER",
                                "email": "clxdrnoguera@gmail.com",
                                "telefono": "88602908",
                                "nickname": "Frank",
                                "_code": "NIC-610-NWa",
                                "created_at": "2018-06-13 03:28:24",
                                "updated_at": "2018-06-13 03:28:24",
                                "puntos": 57
                            }
                        },
                        {
                            "user": {
                                "id": 730,
                                "matricula": "6547",
                                "name": "ROY  GARCIA LUIS ANTONIO",
                                "email": "laroy2006@hotmail.com",
                                "telefono": "54914517",
                                "nickname": "luis antonio",
                                "_code": "GUA-168-Yhs",
                                "created_at": "2018-06-13 03:28:36",
                                "updated_at": "2018-06-13 03:28:36",
                                "puntos": 124
                            }
                        },
                        {
                            "user": {
                                "id": 731,
                                "matricula": "48932",
                                "name": "GARCIA HUECK SILVIA",
                                "email": "diegocuzcano@gmail.com",
                                "telefono": "84579628",
                                "nickname": "SILVIS",
                                "_code": "NIC-798-mkQ",
                                "created_at": "2018-06-13 03:28:39",
                                "updated_at": "2018-06-13 03:28:39",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 732,
                                "matricula": "13900",
                                "name": "Edgar David Hernández García",
                                "email": "etadavidhdz@gmail.com",
                                "telefono": "9961-1646",
                                "nickname": "hdzed",
                                "_code": "HON-312-JIu",
                                "created_at": "2018-06-13 03:29:07",
                                "updated_at": "2018-06-13 03:29:07",
                                "puntos": 19
                            }
                        },
                        {
                            "user": {
                                "id": 733,
                                "matricula": "9562",
                                "name": "GARCIA JUAREZ BYRON ARTURO",
                                "email": "byrcemisur2@hotmail.com",
                                "telefono": "54127821",
                                "nickname": "ObGyn9562",
                                "_code": "GUA-942-pWu",
                                "created_at": "2018-06-13 03:31:27",
                                "updated_at": "2018-06-13 03:31:27",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 734,
                                "matricula": "54928",
                                "name": "Vilma Palacios",
                                "email": "vipalacios_2006@hotmail.com",
                                "telefono": "84707733",
                                "nickname": "Dra.Palacios",
                                "_code": "NIC-096-Kut",
                                "created_at": "2018-06-13 03:44:48",
                                "updated_at": "2018-06-13 03:44:48",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 735,
                                "matricula": "6250",
                                "name": "RODRIGUEZ LUIS CESAR",
                                "email": "luis_cesar3@outlook.es",
                                "telefono": "(504) 96210029",
                                "nickname": "Luigi",
                                "_code": "HON-126-q60",
                                "created_at": "2018-06-13 03:45:23",
                                "updated_at": "2018-06-13 03:45:23",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 736,
                                "matricula": "5579",
                                "name": "PARADA WILFREDO",
                                "email": "jwilfredo69@gmail.com",
                                "telefono": "74505502",
                                "nickname": "Wil",
                                "_code": "SAL-022-uQ7",
                                "created_at": "2018-06-13 03:45:40",
                                "updated_at": "2018-06-13 03:45:40",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 737,
                                "matricula": "10293",
                                "name": "miriam roman gramajo",
                                "email": "miriam.dra@gmail.com",
                                "telefono": "52062807",
                                "nickname": "miriam",
                                "_code": "GUA-303-wzh",
                                "created_at": "2018-06-13 03:47:39",
                                "updated_at": "2018-06-23 03:59:28",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 738,
                                "matricula": "19495",
                                "name": "Vilma Maribel López Moran",
                                "email": "vilmalopez16@yahoo.com",
                                "telefono": "54304070",
                                "nickname": "Vilmitalinda",
                                "_code": "GUA-810-Kil",
                                "created_at": "2018-06-13 03:51:02",
                                "updated_at": "2018-06-13 03:51:02",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 739,
                                "matricula": "11963",
                                "name": "ROCA PAREDES GINNI CAROLINA",
                                "email": "ginnicrp@yahoo.com",
                                "telefono": "00-502-55105110",
                                "nickname": "Ginni",
                                "_code": "GUA-118-yCq",
                                "created_at": "2018-06-13 03:58:53",
                                "updated_at": "2018-06-13 03:58:53",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 740,
                                "matricula": "11961",
                                "name": "CAMEY OVALLE DE SALAZAR LYLIAN CAROLA",
                                "email": "carola.camey71@gmail.com",
                                "telefono": "56993272",
                                "nickname": "Carola Camey",
                                "_code": "GUA-742-pq5",
                                "created_at": "2018-06-13 04:00:05",
                                "updated_at": "2018-06-13 04:00:05",
                                "puntos": 13
                            }
                        },
                        {
                            "user": {
                                "id": 741,
                                "matricula": "4636",
                                "name": "VASQUEZ MIRNA YANETH",
                                "email": "mirnavqv@hotmail.com",
                                "telefono": "97973543",
                                "nickname": "Mirna1970",
                                "_code": "HON-555-XU2",
                                "created_at": "2018-06-13 04:07:13",
                                "updated_at": "2018-06-13 04:07:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 742,
                                "matricula": "16030",
                                "name": "Miguel Alexander Guzmán Flores",
                                "email": "miguelolo_10@hotmail.com",
                                "telefono": "71275701",
                                "nickname": "Lolo",
                                "_code": "SAL-449-uvs",
                                "created_at": "2018-06-13 04:08:58",
                                "updated_at": "2018-06-13 04:08:58",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 743,
                                "matricula": "21249",
                                "name": "Luis Pedro Godínez González",
                                "email": "lpgodinez@gmail.com",
                                "telefono": "33315465",
                                "nickname": "LuisPe",
                                "_code": "GUA-485-Ein",
                                "created_at": "2018-06-13 04:13:56",
                                "updated_at": "2018-06-13 04:13:56",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 744,
                                "matricula": "8310",
                                "name": "RODAS SALAZAR GUSTAVO ADOLFO",
                                "email": "drgars@yahoo.com",
                                "telefono": "40112341",
                                "nickname": "Fitorodas",
                                "_code": "GUA-984-b8G",
                                "created_at": "2018-06-13 04:18:39",
                                "updated_at": "2018-06-13 04:18:39",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 745,
                                "matricula": "12307",
                                "name": "CHAMPET GAMEZ ALEIDA CARINA",
                                "email": "aleidacarina@hotmail.com",
                                "telefono": "77677416",
                                "nickname": "Carina",
                                "_code": "GUA-701-Mbk",
                                "created_at": "2018-06-13 04:36:19",
                                "updated_at": "2018-06-13 04:36:19",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 746,
                                "matricula": "9099",
                                "name": "ALMENDAREZ LICONA MALCOM RODOLFO",
                                "email": "malcon6252@gmail.com",
                                "telefono": "33275545",
                                "nickname": "Malcon",
                                "_code": "HON-372-WOL",
                                "created_at": "2018-06-13 04:42:08",
                                "updated_at": "2018-06-13 04:42:08",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 747,
                                "matricula": "1688",
                                "name": "ESPINOZA OSCAR H.",
                                "email": "carmartinezr@yahoo.com.mx",
                                "telefono": "96914835",
                                "nickname": "Oscar",
                                "_code": "HON-742-ZOT",
                                "created_at": "2018-06-13 04:43:04",
                                "updated_at": "2018-06-13 04:43:04",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 748,
                                "matricula": "5142",
                                "name": "PEREZ VASQUEZ JORGE LUIS",
                                "email": "dr_jorgeluisperez@hotmail.com",
                                "telefono": "59511073",
                                "nickname": "Don George",
                                "_code": "GUA-069-TCA",
                                "created_at": "2018-06-13 04:49:29",
                                "updated_at": "2018-06-13 04:49:29",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 749,
                                "matricula": "8045",
                                "name": "Jaime Escobar",
                                "email": "dr.jaime_escobar@gmail.com",
                                "telefono": "50914052",
                                "nickname": "XoTourLlif3",
                                "_code": "GUA-227-QpU",
                                "created_at": "2018-06-13 05:02:52",
                                "updated_at": "2018-06-13 05:02:52",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 750,
                                "matricula": "8443",
                                "name": "OVIEDO DE KLEE SANDRA LISSETTE",
                                "email": "drasandriok@yahoo.es",
                                "telefono": "59501890",
                                "nickname": "Dra Sandra Oviedo",
                                "_code": "GUA-752-bwj",
                                "created_at": "2018-06-13 05:14:40",
                                "updated_at": "2018-06-13 05:14:40",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 751,
                                "matricula": "1482",
                                "name": "Marvin Ixco",
                                "email": "jaic2912@gmail.com",
                                "telefono": "52057180",
                                "nickname": "MarvinI2201",
                                "_code": "GUA-338-ob8",
                                "created_at": "2018-06-13 05:19:16",
                                "updated_at": "2018-06-13 05:19:16",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 752,
                                "matricula": "4535",
                                "name": "ARMAS PIEDRASANTA LUIS FELIPE",
                                "email": "lfarmasp@hotmail.com",
                                "telefono": "59461883",
                                "nickname": "luisfe",
                                "_code": "GUA-285-hQp",
                                "created_at": "2018-06-13 05:41:12",
                                "updated_at": "2018-06-13 05:41:12",
                                "puntos": 134
                            }
                        },
                        {
                            "user": {
                                "id": 753,
                                "matricula": "8623",
                                "name": "Marcio Elíseo cartagena",
                                "email": "eliseocartagena@gmail.com",
                                "telefono": "96241597",
                                "nickname": "Eliseocartagena",
                                "_code": "HON-111-POH",
                                "created_at": "2018-06-13 05:41:18",
                                "updated_at": "2018-06-13 05:41:18",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 754,
                                "matricula": "180",
                                "name": "Maria Eugenia Gutierrez",
                                "email": "gutierrezvanegasmariaeugenia@gmail.com",
                                "telefono": "89929329",
                                "nickname": "Mgutierrez",
                                "_code": "NIC-180-ABR",
                                "created_at": "2018-06-13 05:42:49",
                                "updated_at": "2018-06-13 05:42:49",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 755,
                                "matricula": "10801",
                                "name": "Karen Fernandez",
                                "email": "dariofernandez87@yahoo.com",
                                "telefono": "88640486",
                                "nickname": "karen85",
                                "_code": "HON-302-udm",
                                "created_at": "2018-06-13 05:47:51",
                                "updated_at": "2018-06-13 05:47:51",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 756,
                                "matricula": "11790",
                                "name": "ARROYO SANCHEZ HERIBERTO",
                                "email": "harroyo_88@hotmail.es",
                                "telefono": "70155819",
                                "nickname": "harroyos",
                                "_code": "COR-458-rFl",
                                "created_at": "2018-06-13 05:50:41",
                                "updated_at": "2018-07-10 04:22:39",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 757,
                                "matricula": "12965",
                                "name": "ROSA LIDIA MEZA ROMERO",
                                "email": "rosameza0191@gmail.com",
                                "telefono": "+50497756446",
                                "nickname": "rmeza",
                                "_code": "HON-503-hlW",
                                "created_at": "2018-06-13 05:53:05",
                                "updated_at": "2018-06-13 05:53:05",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 758,
                                "matricula": "10967",
                                "name": "VASQUEZ LINARES CLAUDIA MARIA",
                                "email": "leonardolandaverde1990@gmail.com",
                                "telefono": "24700363",
                                "nickname": "Claudia maría",
                                "_code": "SAL-221-mJ6",
                                "created_at": "2018-06-13 05:58:59",
                                "updated_at": "2018-06-13 05:58:59",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 759,
                                "matricula": "81989105",
                                "name": "Jaqueline Del Carmen Castillo Chamorro",
                                "email": "mariojgarciac@gmail.com",
                                "telefono": "81989105",
                                "nickname": "Dr.Jaqueline",
                                "_code": "NIC-322-h4F",
                                "created_at": "2018-06-13 06:03:12",
                                "updated_at": "2018-06-13 06:03:12",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 760,
                                "matricula": "8537",
                                "name": "VILLEDA SANCHEZ LINA MERCEDES",
                                "email": "l-villeda@hotmail.com",
                                "telefono": "98032586",
                                "nickname": "Lina",
                                "_code": "HON-813-yeC",
                                "created_at": "2018-06-13 06:14:00",
                                "updated_at": "2018-06-13 06:14:00",
                                "puntos": 58
                            }
                        },
                        {
                            "user": {
                                "id": 761,
                                "matricula": "5070",
                                "name": "Alfredo Pineda Escoto",
                                "email": "alfpin1951@gmail.com",
                                "telefono": "99820933",
                                "nickname": "Alfredo",
                                "_code": "HON-612-waw",
                                "created_at": "2018-06-13 06:14:32",
                                "updated_at": "2018-06-14 05:28:07",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 762,
                                "matricula": "11504",
                                "name": "Cladina Angélica Zepeda Gaitan",
                                "email": "angelicagaitan28@gmail.com",
                                "telefono": "51287861",
                                "nickname": "Claudina",
                                "_code": "GUA-410-V2X",
                                "created_at": "2018-06-13 06:17:09",
                                "updated_at": "2018-06-13 06:17:09",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 763,
                                "matricula": "10301",
                                "name": "ESCOBAR CORADO, JUAN PABLO",
                                "email": "juanpabloescobar8@yahoo.com",
                                "telefono": "49515833",
                                "nickname": "JuanPa",
                                "_code": "GUA-511-iFY",
                                "created_at": "2018-06-13 06:22:09",
                                "updated_at": "2018-06-13 06:22:09",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 764,
                                "matricula": "6324",
                                "name": "VILLEGAS ARGUETA VIDAL AMILCAR",
                                "email": "pgvz_93@hotmail.com",
                                "telefono": "52056824",
                                "nickname": "Vidalv",
                                "_code": "GUA-579-Sv3",
                                "created_at": "2018-06-13 06:24:00",
                                "updated_at": "2018-06-13 06:24:00",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 765,
                                "matricula": "9966",
                                "name": "Edwin David Arauz Martinez",
                                "email": "davidarauz89@yahoo.es",
                                "telefono": "+504 32309632",
                                "nickname": "Edwin",
                                "_code": "HON-313-OCg",
                                "created_at": "2018-06-13 06:28:44",
                                "updated_at": "2018-06-13 06:28:44",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 766,
                                "matricula": "10563",
                                "name": "VALLE GALLARDO CINDY CLARISSA",
                                "email": "clarivalle_87@hotmail.com",
                                "telefono": "3182 2885",
                                "nickname": "Coquita87",
                                "_code": "HON-386-edo",
                                "created_at": "2018-06-13 06:30:44",
                                "updated_at": "2018-06-13 06:30:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 767,
                                "matricula": "4056",
                                "name": "Marith Lopez",
                                "email": "marithlo@msn.com",
                                "telefono": "98770189",
                                "nickname": "Marith",
                                "_code": "HON-954-GFi",
                                "created_at": "2018-06-13 06:31:16",
                                "updated_at": "2018-06-13 06:31:16",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 768,
                                "matricula": "5678",
                                "name": "Clara Reina Victoria Parada de Torres",
                                "email": "crpv67@gmail.com",
                                "telefono": "78101337",
                                "nickname": "Reina",
                                "_code": "SAL-082-tBU",
                                "created_at": "2018-06-13 06:34:33",
                                "updated_at": "2018-06-13 06:34:33",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 769,
                                "matricula": "14657",
                                "name": "DUARTE QUIROA JOSE EDWARDO",
                                "email": "drjduarte_1@hotmail.com",
                                "telefono": "40238911",
                                "nickname": "Drjduarte",
                                "_code": "GUA-769-Svj",
                                "created_at": "2018-06-13 06:40:11",
                                "updated_at": "2018-06-13 06:40:11",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 770,
                                "matricula": "15515",
                                "name": "RIVAS LIMA SANTOS ALEXANDER",
                                "email": "alex_rl17@yahoo.es",
                                "telefono": "61476297",
                                "nickname": "alex",
                                "_code": "SAL-020-rto",
                                "created_at": "2018-06-13 06:40:24",
                                "updated_at": "2018-06-13 06:40:24",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 771,
                                "matricula": "15636",
                                "name": "Francisco Javier Sánchez López",
                                "email": "frankiessanchez@gmail.com",
                                "telefono": "86487869-77317532",
                                "nickname": "chico mundialista",
                                "_code": "NIC-760-bfY",
                                "created_at": "2018-06-13 06:42:40",
                                "updated_at": "2018-06-13 06:42:40",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 772,
                                "matricula": "16946",
                                "name": "MONTERROSO ORELLANA MARIELA",
                                "email": "lemore20@hotmail.com",
                                "telefono": "52037005",
                                "nickname": "lemore20",
                                "_code": "GUA-185-36F",
                                "created_at": "2018-06-13 06:42:41",
                                "updated_at": "2018-06-13 06:42:41",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 773,
                                "matricula": "807882574",
                                "name": "Carlos Jesus Interiano Rodriguez",
                                "email": "cajeinh@yahoo.com",
                                "telefono": "96672076",
                                "nickname": "MENDOZA",
                                "_code": "HON-845-SHg",
                                "created_at": "2018-06-13 06:49:35",
                                "updated_at": "2018-06-13 07:20:07",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 774,
                                "matricula": "3445",
                                "name": "ZELAYA ZALDAÑA LUCAS ARTURO",
                                "email": "dr.lucas.zelaya@gmail.com",
                                "telefono": "+50495651726",
                                "nickname": "Ciclón Azul",
                                "_code": "HON-619-7Zq",
                                "created_at": "2018-06-13 06:50:00",
                                "updated_at": "2018-06-13 06:50:00",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 775,
                                "matricula": "3419",
                                "name": "AVELAR AGUILAR OSMAN ANTONIO",
                                "email": "osman.avelar@yahoo.com",
                                "telefono": "99263487",
                                "nickname": "Marathon",
                                "_code": "HON-857-3PE",
                                "created_at": "2018-06-13 06:57:51",
                                "updated_at": "2018-06-13 06:57:51",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 776,
                                "matricula": "3596",
                                "name": "ALVARENGA JAIME ANTONIO",
                                "email": "jayan1062@gmail.com",
                                "telefono": "78880073",
                                "nickname": "jayan1062",
                                "_code": "SAL-907-Zgf",
                                "created_at": "2018-06-13 06:57:55",
                                "updated_at": "2018-06-13 06:57:55",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 777,
                                "matricula": "15013",
                                "name": "Ana Lucía Pontaza Cabrera",
                                "email": "lucypontaza@hotmail.com",
                                "telefono": "55828795",
                                "nickname": "lucy",
                                "_code": "GUA-141-yew",
                                "created_at": "2018-06-13 07:03:17",
                                "updated_at": "2018-06-13 07:03:17",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 778,
                                "matricula": "11831",
                                "name": "MENDEZ TEJADA DE ORDOÑEZ YOLANDA MARIA",
                                "email": "dryolymendez@hotmail.com",
                                "telefono": "58581516",
                                "nickname": "Yolanda Méndez",
                                "_code": "GUA-346-H64",
                                "created_at": "2018-06-13 07:03:25",
                                "updated_at": "2018-06-13 07:03:25",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 779,
                                "matricula": "8684",
                                "name": "FLORES GULARTE MARIA ALEJANDRA",
                                "email": "alejaflor@gmail.com",
                                "telefono": "42143102",
                                "nickname": "alejaflor",
                                "_code": "GUA-944-Yci",
                                "created_at": "2018-06-13 07:04:18",
                                "updated_at": "2018-07-01 03:24:47",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 780,
                                "matricula": "10174",
                                "name": "REJOPACHI CABRERA JUAN JOSE",
                                "email": "jrejopachi@hotmail.com",
                                "telefono": "5855-9180",
                                "nickname": "Juan",
                                "_code": "GUA-680-0Kt",
                                "created_at": "2018-06-13 07:06:30",
                                "updated_at": "2018-06-14 07:10:29",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 781,
                                "matricula": "6413",
                                "name": "RODRIGUEZ RAMOS AARON BARUCH",
                                "email": "abaruch_10@hotmail.com",
                                "telefono": "96976213",
                                "nickname": "leones",
                                "_code": "HON-534-8Dp",
                                "created_at": "2018-06-13 07:06:41",
                                "updated_at": "2018-06-13 07:06:41",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 782,
                                "matricula": "16321",
                                "name": "Miguel Montenegro",
                                "email": "michael6m@hotmail.com",
                                "telefono": "41280710",
                                "nickname": "Mike",
                                "_code": "GUA-407-upz",
                                "created_at": "2018-06-13 07:07:16",
                                "updated_at": "2018-06-17 09:53:19",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 783,
                                "matricula": "8948",
                                "name": "ANDRINO HERRERA PEDRO",
                                "email": "drandrinoh@gmail.com",
                                "telefono": "47703935",
                                "nickname": "Pandrino",
                                "_code": "GUA-837-p3E",
                                "created_at": "2018-06-13 07:08:21",
                                "updated_at": "2018-06-13 07:08:21",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 784,
                                "matricula": "4038",
                                "name": "VARGAS CHINCHILLA ADRIAN",
                                "email": "tomasvargasrobert@gmial.com",
                                "telefono": "83184091",
                                "nickname": "Adrian",
                                "_code": "COR-030-CPT",
                                "created_at": "2018-06-13 07:08:22",
                                "updated_at": "2018-06-13 07:08:22",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 785,
                                "matricula": "7147",
                                "name": "RUÍZ GARCIA, FLOR DE MARIA",
                                "email": "dr_flordemaria@hotmail.com",
                                "telefono": "55984410",
                                "nickname": "Doña Flor",
                                "_code": "GUA-374-2Jr",
                                "created_at": "2018-06-13 07:11:49",
                                "updated_at": "2018-06-13 07:11:49",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 786,
                                "matricula": "10150",
                                "name": "GUERRA ARRIVILLAGA OSCAR HUMBERTO",
                                "email": "droscarguerra@yahoo.es",
                                "telefono": "52021128",
                                "nickname": "OSCAR123",
                                "_code": "GUA-018-SrU",
                                "created_at": "2018-06-13 07:12:50",
                                "updated_at": "2018-06-15 19:29:03",
                                "puntos": 123
                            }
                        },
                        {
                            "user": {
                                "id": 787,
                                "matricula": "7026",
                                "name": "SANCHEZ  SIERRA  HECTOR  MANFREDO",
                                "email": "sierrahector59@gmail.com",
                                "telefono": "57438514",
                                "nickname": "Héctor Sánchez",
                                "_code": "GUA-295-4pJ",
                                "created_at": "2018-06-13 07:14:12",
                                "updated_at": "2018-06-13 07:14:12",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 788,
                                "matricula": "10222",
                                "name": "DE LEON SAC MIGUEL ANGEL",
                                "email": "sledm@hotmail.com",
                                "telefono": "77632350",
                                "nickname": "Brazilcampeón",
                                "_code": "GUA-183-Ruw",
                                "created_at": "2018-06-13 07:15:15",
                                "updated_at": "2018-06-13 07:15:15",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 789,
                                "matricula": "5515",
                                "name": "QUIÑONEZ GARCIA LUIS EDGAR",
                                "email": "luisedgarmd@gmail.com",
                                "telefono": "54113410",
                                "nickname": "Neptuno",
                                "_code": "GUA-621-e0Y",
                                "created_at": "2018-06-13 07:15:35",
                                "updated_at": "2018-06-13 07:15:35",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 790,
                                "matricula": "8315",
                                "name": "José Carlos Méndez Gallo",
                                "email": "mengallo@live.com",
                                "telefono": "83242162",
                                "nickname": "Ace",
                                "_code": "NIC-560-13C",
                                "created_at": "2018-06-13 07:16:31",
                                "updated_at": "2018-06-13 07:16:31",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 791,
                                "matricula": "14449",
                                "name": "GARCIA HERNANDEZ RAUL MAURICIO",
                                "email": "dr.raulgarciahernandez@gmail.com",
                                "telefono": "78196789",
                                "nickname": "ralm15",
                                "_code": "sal-836-zk4",
                                "created_at": "2018-06-13 07:20:29",
                                "updated_at": "2018-06-13 07:20:29",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 792,
                                "matricula": "9026",
                                "name": "Otto Villagran",
                                "email": "otto-6@hotmail.com",
                                "telefono": "59936839",
                                "nickname": "Otto6ViBa",
                                "_code": "GUA-819-Gmy",
                                "created_at": "2018-06-13 07:21:57",
                                "updated_at": "2018-06-13 07:21:57",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 793,
                                "matricula": "10462",
                                "name": "MERIDA HERRERA DE DE LEON MAGDA YANET",
                                "email": "doctoramagdamerida@hotmail.com",
                                "telefono": "52031904",
                                "nickname": "GOL",
                                "_code": "GUA-274-vnS",
                                "created_at": "2018-06-13 07:25:25",
                                "updated_at": "2018-06-13 07:25:25",
                                "puntos": 132
                            }
                        },
                        {
                            "user": {
                                "id": 794,
                                "matricula": "9021",
                                "name": "ARGUETA ANTON NEFTALI (SON)",
                                "email": "nefarg21@hotmail.com",
                                "telefono": "57691700",
                                "nickname": "NEFARGANT",
                                "_code": "GUA-998-mEY",
                                "created_at": "2018-06-13 07:26:25",
                                "updated_at": "2018-06-13 07:26:25",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 795,
                                "matricula": "8916",
                                "name": "AYALA VARGAS MARITZA ARELY",
                                "email": "dramarely@yahoo.es",
                                "telefono": "71806790",
                                "nickname": "dramarely",
                                "_code": "SAL-665-3ql",
                                "created_at": "2018-06-13 07:33:03",
                                "updated_at": "2018-06-13 07:33:03",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 796,
                                "matricula": "6597",
                                "name": "BARRIOS GOMEZ ARIEL",
                                "email": "ariel_barrios_g1@hotmail.com",
                                "telefono": "53066722",
                                "nickname": "Ariel",
                                "_code": "GUA-731-mpl",
                                "created_at": "2018-06-13 07:35:22",
                                "updated_at": "2018-06-13 07:35:22",
                                "puntos": 64
                            }
                        },
                        {
                            "user": {
                                "id": 797,
                                "matricula": "10124",
                                "name": "CASTRO CACAO ADAN BENJAMIN",
                                "email": "dradancastro@hotmail.com",
                                "telefono": "30095319",
                                "nickname": "Josué",
                                "_code": "GUA-209-hs5",
                                "created_at": "2018-06-13 07:35:46",
                                "updated_at": "2018-06-13 07:35:46",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 798,
                                "matricula": "9640",
                                "name": "COTTOM HUGO LEONEL",
                                "email": "hugocottom@hotmail.com",
                                "telefono": "55629746",
                                "nickname": "Hugo Cottom",
                                "_code": "Gua-037-25t",
                                "created_at": "2018-06-13 07:37:41",
                                "updated_at": "2018-06-29 10:27:40",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 799,
                                "matricula": "6484",
                                "name": "CUELLAR RECINOS NERY ROLANDO",
                                "email": "nery_cuellar@hotmail.com",
                                "telefono": "41289196",
                                "nickname": "Nery",
                                "_code": "GUA-080-Fab",
                                "created_at": "2018-06-13 07:41:37",
                                "updated_at": "2018-06-13 07:41:37",
                                "puntos": 43
                            }
                        },
                        {
                            "user": {
                                "id": 800,
                                "matricula": "4897",
                                "name": "HENRIQUEZ EGGENBERGER JOSE ROBERTO",
                                "email": "roberto0756@hotmail.com",
                                "telefono": "53009739",
                                "nickname": "DrRobertoH",
                                "_code": "GUA-311-6zV",
                                "created_at": "2018-06-13 07:42:17",
                                "updated_at": "2018-06-13 07:42:17",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 801,
                                "matricula": "45351",
                                "name": "massiel montalvan",
                                "email": "massimelody@hotmail.com",
                                "telefono": "88310009",
                                "nickname": "massi19",
                                "_code": "NIC-159-1Wk",
                                "created_at": "2018-06-13 07:46:00",
                                "updated_at": "2018-06-13 07:46:00",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 802,
                                "matricula": "10303",
                                "name": "LARIOS VILLAGRAN HILMAR AUGUSTO",
                                "email": "hilmarlarios@yahoo.com",
                                "telefono": "59179528",
                                "nickname": "hilmar",
                                "_code": "GUA-494-lkA",
                                "created_at": "2018-06-13 07:50:01",
                                "updated_at": "2018-06-13 07:50:01",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 803,
                                "matricula": "3427",
                                "name": "GODINEZ  SOTO  OCTAVIO  ANIBAL",
                                "email": "dranibalgodinezsoto@hotmail.com",
                                "telefono": "52084518",
                                "nickname": "panda",
                                "_code": "Gua-417-EIL",
                                "created_at": "2018-06-13 07:51:51",
                                "updated_at": "2018-06-30 06:34:43",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 804,
                                "matricula": "9960",
                                "name": "Montalvan Chirinos Kelly Anahid",
                                "email": "kellymontalvan@hotmail.com",
                                "telefono": "88532776",
                                "nickname": "Kellyta",
                                "_code": "HON-576-IYA",
                                "created_at": "2018-06-13 07:53:21",
                                "updated_at": "2018-06-13 07:53:21",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 805,
                                "matricula": "12205",
                                "name": "BERNY MONTERO RODRIGUEZ",
                                "email": "berny_mon10@hotmail.com",
                                "telefono": "60464009",
                                "nickname": "DRMONTERO",
                                "_code": "cor-066-de8",
                                "created_at": "2018-06-13 07:54:01",
                                "updated_at": "2018-06-13 07:54:01",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 806,
                                "matricula": "9562",
                                "name": "Bruno Andre Fuentes Cordova",
                                "email": "beno29dog@yahoo.com",
                                "telefono": "74357832",
                                "nickname": "benotty",
                                "_code": "SAL-510-Fu2",
                                "created_at": "2018-06-13 07:55:03",
                                "updated_at": "2018-07-02 02:22:25",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 807,
                                "matricula": "5119",
                                "name": "LUARCA GIL JULIO ROBERTO",
                                "email": "jrluarcagil@gmail.com",
                                "telefono": "52067811",
                                "nickname": "JRLUARCA",
                                "_code": "GUA-327-WM5",
                                "created_at": "2018-06-13 07:57:01",
                                "updated_at": "2018-07-06 05:57:28",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 808,
                                "matricula": "5072",
                                "name": "SOLARES BARILLAS, SONIA ILIANA",
                                "email": "soilso57@hotmail.com",
                                "telefono": "56911431",
                                "nickname": "Ilia",
                                "_code": "GUA-950-IaR",
                                "created_at": "2018-06-13 07:57:27",
                                "updated_at": "2018-06-13 07:57:27",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 809,
                                "matricula": "8159",
                                "name": "MAGAÑA CASTRO CLAUDIA FLOR DE MARÍA",
                                "email": "clinicamedicarosma@gmail.com",
                                "telefono": "54076073",
                                "nickname": "Claudia Flor de Maria Magaña Castro",
                                "_code": "GUA-343-ljm",
                                "created_at": "2018-06-13 07:58:34",
                                "updated_at": "2018-06-13 07:58:34",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 810,
                                "matricula": "5071611989",
                                "name": "Ivan Alexander Alvarez Barralaga",
                                "email": "ivanalexgwing@hotmail.com",
                                "telefono": "98303805",
                                "nickname": "DESTRUCTTENKOFF BARRALAGA",
                                "_code": "HON-544-0No",
                                "created_at": "2018-06-13 08:02:39",
                                "updated_at": "2018-06-13 08:07:32",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 811,
                                "matricula": "5271",
                                "name": "MANCHAME ARRUE RAUL RANFERY",
                                "email": "drmanchame@gmail.com",
                                "telefono": "59456274",
                                "nickname": "Mancha",
                                "_code": "GUA-138-IEp",
                                "created_at": "2018-06-13 08:08:02",
                                "updated_at": "2018-06-13 08:08:02",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 812,
                                "matricula": "8159",
                                "name": "MAGAÑA CASTRO CLAUDIA FLOR DE MARÍA",
                                "email": "flor4claudia@hotmail.com",
                                "telefono": "54076073",
                                "nickname": "Claudia Flor de Maria Magaña Castro",
                                "_code": "GUA-553-QRM",
                                "created_at": "2018-06-13 08:11:45",
                                "updated_at": "2018-06-13 08:11:45",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 813,
                                "matricula": "7465",
                                "name": "AXPUACA DIAZ LISANDRO ANIBAL",
                                "email": "draxpuaca612@gmail.com",
                                "telefono": "53832835",
                                "nickname": "Lisandro",
                                "_code": "GUA-299-lVb",
                                "created_at": "2018-06-13 08:15:04",
                                "updated_at": "2018-06-13 08:15:04",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 814,
                                "matricula": "4173",
                                "name": "ALVARDO PEREZ JULIO ROBERTO",
                                "email": "bobbyalperez@gmail.com",
                                "telefono": "57030955",
                                "nickname": "Bobby",
                                "_code": "GUA-434-daM",
                                "created_at": "2018-06-13 08:17:08",
                                "updated_at": "2018-06-13 08:17:08",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 815,
                                "matricula": "3309",
                                "name": "ALAS VILLACORTA JORGE",
                                "email": "jorgva@yahoo.com",
                                "telefono": "9991-1715",
                                "nickname": "JVillacort",
                                "_code": "HON-539-yp7",
                                "created_at": "2018-06-13 08:22:51",
                                "updated_at": "2018-06-30 09:01:33",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 816,
                                "matricula": "7318",
                                "name": "HERNANDEZ GONZALEZ JAIME ARTURO",
                                "email": "es886@yahoo.com",
                                "telefono": "78834600",
                                "nickname": "Jaime",
                                "_code": "SAL-619-2Uq",
                                "created_at": "2018-06-13 08:26:55",
                                "updated_at": "2018-06-14 00:47:54",
                                "puntos": 66
                            }
                        },
                        {
                            "user": {
                                "id": 817,
                                "matricula": "11709",
                                "name": "SALAZAR ORELLANA JOSE LUIS",
                                "email": "drjoseluis.salazar@gmail.com",
                                "telefono": "71601596",
                                "nickname": "José Luis",
                                "_code": "SAL-762-XKP",
                                "created_at": "2018-06-13 08:29:34",
                                "updated_at": "2018-06-25 21:50:40",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 818,
                                "matricula": "6731",
                                "name": "DUANES PALOMO LUCIA GLORIBEL",
                                "email": "luciduanes2000@gmail.com",
                                "telefono": "78414851",
                                "nickname": "Lucia",
                                "_code": "SAL-956-RmZ",
                                "created_at": "2018-06-13 08:30:30",
                                "updated_at": "2018-06-13 08:30:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 819,
                                "matricula": "12274",
                                "name": "CHIN PIRIR RICHARD MAURICIO",
                                "email": "gladys3079@yahoo.com",
                                "telefono": "53050911",
                                "nickname": "chin",
                                "_code": "GUA-595-UjP",
                                "created_at": "2018-06-13 08:42:19",
                                "updated_at": "2018-06-14 08:47:16",
                                "puntos": 128
                            }
                        },
                        {
                            "user": {
                                "id": 820,
                                "matricula": "11490",
                                "name": "CASTAÑEDA MONTERROSO LUDY MARLENY",
                                "email": "ludycasta@hotmail.com",
                                "telefono": "59033794",
                                "nickname": "Ludycasta05",
                                "_code": "GUA-588-79Z",
                                "created_at": "2018-06-13 08:43:49",
                                "updated_at": "2018-06-13 08:43:49",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 821,
                                "matricula": "10624",
                                "name": "ALVAREZ SOTO MAYLEEN DORYLEE",
                                "email": "dubon151141@gmail.com",
                                "telefono": "52019183",
                                "nickname": "Mayleen Dorylee",
                                "_code": "GUA-246-7Y0",
                                "created_at": "2018-06-13 08:56:35",
                                "updated_at": "2018-06-13 08:56:35",
                                "puntos": 121
                            }
                        },
                        {
                            "user": {
                                "id": 822,
                                "matricula": "6380",
                                "name": "FLORES CARRERA GILDA LORENA",
                                "email": "veralucy20@hotmail.com",
                                "telefono": "58254611",
                                "nickname": "Gilda Flores",
                                "_code": "GUA-130-PYc",
                                "created_at": "2018-06-13 08:56:56",
                                "updated_at": "2018-06-13 08:56:56",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 823,
                                "matricula": "4109",
                                "name": "Sergio Bethancourt Rodriguez",
                                "email": "serbetha@yahoo.com",
                                "telefono": "54110695",
                                "nickname": "SERBETHA",
                                "_code": "GUA-206-6JV",
                                "created_at": "2018-06-13 09:01:26",
                                "updated_at": "2018-06-30 07:29:48",
                                "puntos": 62
                            }
                        },
                        {
                            "user": {
                                "id": 824,
                                "matricula": "7886",
                                "name": "HERRERA ARDAVIN CESAR ESTUARDO",
                                "email": "janismuoz@yahoo.com",
                                "telefono": "55091773",
                                "nickname": "Checha",
                                "_code": "GUA-542-c3Y",
                                "created_at": "2018-06-13 09:05:00",
                                "updated_at": "2018-06-13 09:05:00",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 825,
                                "matricula": "9735",
                                "name": "PEREZ LOPEZ AUGUSTO ESTANISLAO",
                                "email": "drperezusac@gmail.com",
                                "telefono": "54207086",
                                "nickname": "Guto",
                                "_code": "GUA-060-O51",
                                "created_at": "2018-06-13 09:05:34",
                                "updated_at": "2018-06-13 09:05:34",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 826,
                                "matricula": "7326",
                                "name": "SANDOVAL CLELIA",
                                "email": "clemasan@hotmail.com",
                                "telefono": "32186612",
                                "nickname": "LIA",
                                "_code": "HON-037-xnP",
                                "created_at": "2018-06-13 09:09:21",
                                "updated_at": "2018-06-13 09:09:21",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 827,
                                "matricula": "10338",
                                "name": "CUBUR QUEXEL HUGO FLORENTIN",
                                "email": "hfcubur@yahoo.com",
                                "telefono": "5239-1769",
                                "nickname": "FIESTA MUNDIAL",
                                "_code": "GUA-718-gzb",
                                "created_at": "2018-06-13 09:15:39",
                                "updated_at": "2018-06-13 09:15:39",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 828,
                                "matricula": "10212",
                                "name": "PAVON PAGOAGA NORA ALEJANDRA",
                                "email": "npavon19@gmail.com",
                                "telefono": "33923123",
                                "nickname": "npavon",
                                "_code": "HON-759-Wxg",
                                "created_at": "2018-06-13 09:22:17",
                                "updated_at": "2018-06-13 09:22:17",
                                "puntos": 100
                            }
                        },
                        {
                            "user": {
                                "id": 829,
                                "matricula": "12148",
                                "name": "BETANCOURTH MARVIN MARADIAGA",
                                "email": "marmaradiaga89@gmail.com",
                                "telefono": "88343851",
                                "nickname": "Marv",
                                "_code": "HON-016-gnu",
                                "created_at": "2018-06-13 09:24:26",
                                "updated_at": "2018-06-13 09:24:26",
                                "puntos": 124
                            }
                        },
                        {
                            "user": {
                                "id": 830,
                                "matricula": "3802",
                                "name": "LEIVA ENRIQUEZ MYNOR ABEL",
                                "email": "leivamynor@gmail.com",
                                "telefono": "55178754",
                                "nickname": "Mynor Leiva",
                                "_code": "GUA-000-OiX",
                                "created_at": "2018-06-13 09:46:45",
                                "updated_at": "2018-07-05 06:54:01",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 831,
                                "matricula": "9554",
                                "name": "ANA VIRGINIA VILLALOBOS",
                                "email": "vir_villalobos@hotmail.com",
                                "telefono": "77833204",
                                "nickname": "Virginia$2601",
                                "_code": "SAL-921-iJJ",
                                "created_at": "2018-06-13 10:29:05",
                                "updated_at": "2018-06-13 10:29:05",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 832,
                                "matricula": "9435",
                                "name": "Ramón Ulises López Fúnez",
                                "email": "ulises.lopez@outlook.com",
                                "telefono": "86016088",
                                "nickname": "Ulisito18",
                                "_code": "NIC-817-X48",
                                "created_at": "2018-06-13 10:59:43",
                                "updated_at": "2018-06-13 10:59:43",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 833,
                                "matricula": "9722",
                                "name": "RUANO MELARA JOSE ALFREDO",
                                "email": "melararuano@hotmail.com",
                                "telefono": "74502223",
                                "nickname": "JOALME",
                                "_code": "SAL-773-8YH",
                                "created_at": "2018-06-13 15:28:03",
                                "updated_at": "2018-06-13 15:28:03",
                                "puntos": 130
                            }
                        },
                        {
                            "user": {
                                "id": 834,
                                "matricula": "4229",
                                "name": "Marcela Mora Olmedo",
                                "email": "moramarcela@la-bridgestone.com",
                                "telefono": "8927-0807",
                                "nickname": "Marce",
                                "_code": "COR-597-7eX",
                                "created_at": "2018-06-13 15:52:12",
                                "updated_at": "2018-06-13 15:52:12",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 835,
                                "matricula": "5071",
                                "name": "LOPEZ SOLARES JORGE ADALBERTO",
                                "email": "jorgeantoniosolares@ufm.edu",
                                "telefono": "56910010",
                                "nickname": "Jorge",
                                "_code": "GUA-042-KNU",
                                "created_at": "2018-06-13 15:54:43",
                                "updated_at": "2018-06-13 15:54:43",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 836,
                                "matricula": "10209",
                                "name": "ANGUETA SABILLON VANESSA CONSUELO",
                                "email": "vannessa_argueta03@hotmail.com",
                                "telefono": "98796795",
                                "nickname": "Vargueta",
                                "_code": "HON-522-jQF",
                                "created_at": "2018-06-13 16:19:07",
                                "updated_at": "2018-06-13 16:19:07",
                                "puntos": 53
                            }
                        },
                        {
                            "user": {
                                "id": 837,
                                "matricula": "3856",
                                "name": "Carrera Chang Edgar Leonel",
                                "email": "chinocarrerachang@yahoo.com",
                                "telefono": "44345028",
                                "nickname": "edgar",
                                "_code": "gua-079-C6b",
                                "created_at": "2018-06-13 16:30:24",
                                "updated_at": "2018-06-13 16:30:24",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 838,
                                "matricula": "7683",
                                "name": "MEJIA GUZMAN MELISSA ALEJANDRA",
                                "email": "jessicaivethp@yahoo.com",
                                "telefono": "99950322",
                                "nickname": "Melissa",
                                "_code": "Hon-255-gfw",
                                "created_at": "2018-06-13 16:34:21",
                                "updated_at": "2018-06-13 16:34:21",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 839,
                                "matricula": "16213",
                                "name": "MEDINA VELASQUEZ KENIA MARGARITA",
                                "email": "kenya_medin@hotmail.com",
                                "telefono": "78838918",
                                "nickname": "keniamv",
                                "_code": "SAL-797-aqN",
                                "created_at": "2018-06-13 16:54:30",
                                "updated_at": "2018-06-13 16:54:30",
                                "puntos": 66
                            }
                        },
                        {
                            "user": {
                                "id": 840,
                                "matricula": "3955",
                                "name": "MORA CORRALES LUIS CARLOS",
                                "email": "drluismora917@gmail.com",
                                "telefono": "8383-8525",
                                "nickname": "Calo",
                                "_code": "COR-252-3SW",
                                "created_at": "2018-06-13 17:19:32",
                                "updated_at": "2018-06-16 00:27:28",
                                "puntos": 113
                            }
                        },
                        {
                            "user": {
                                "id": 841,
                                "matricula": "12880",
                                "name": "FLORES FLORES DANIEL ARQUIMIDES",
                                "email": "docdanielflores_80@hotmail.com",
                                "telefono": "78709699",
                                "nickname": "docdanielflores_80",
                                "_code": "sal-782-liz",
                                "created_at": "2018-06-13 17:21:53",
                                "updated_at": "2018-06-13 17:21:53",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 842,
                                "matricula": "10365",
                                "name": "ALONSO GOUSSEN JOSE ALBERTO",
                                "email": "avbetoloco@gmail.com",
                                "telefono": "88860098",
                                "nickname": "Alonbe",
                                "_code": "NIC-105-ah8",
                                "created_at": "2018-06-13 17:28:20",
                                "updated_at": "2018-06-13 17:28:20",
                                "puntos": 111
                            }
                        },
                        {
                            "user": {
                                "id": 843,
                                "matricula": "12531",
                                "name": "Fernán Eduardo Núñez",
                                "email": "nanref.2610@gmail.com",
                                "telefono": "96859118",
                                "nickname": "Te Nanref",
                                "_code": "HON-555-aZ3",
                                "created_at": "2018-06-13 17:40:13",
                                "updated_at": "2018-06-13 17:40:13",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 844,
                                "matricula": "20605",
                                "name": "Emilio Antonio Gonzalez Chavez",
                                "email": "emiliogonzalez991@gmail.com",
                                "telefono": "55210487",
                                "nickname": "EmilioGonzalez991",
                                "_code": "GUA-841-rcj",
                                "created_at": "2018-06-13 17:45:50",
                                "updated_at": "2018-06-13 17:45:50",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 845,
                                "matricula": "10822",
                                "name": "Susana Soto",
                                "email": "susy2874@yahoo.com",
                                "telefono": "40056000",
                                "nickname": "SS",
                                "_code": "GUA-255-1es",
                                "created_at": "2018-06-13 17:56:56",
                                "updated_at": "2018-06-13 17:56:56",
                                "puntos": 66
                            }
                        },
                        {
                            "user": {
                                "id": 846,
                                "matricula": "5874",
                                "name": "Carlos Montes",
                                "email": "andres.montes2005@gmail.com",
                                "telefono": "98609440",
                                "nickname": "chino",
                                "_code": "HON-902-D54",
                                "created_at": "2018-06-13 18:09:45",
                                "updated_at": "2018-06-13 18:09:45",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 847,
                                "matricula": "7883",
                                "name": "IXTACUY CHAMALE JACOBO ALBERTO",
                                "email": "jacoboixtacuy54@gmail.com",
                                "telefono": "42696568",
                                "nickname": "oscar",
                                "_code": "GUA-572-I0S",
                                "created_at": "2018-06-13 18:11:07",
                                "updated_at": "2018-06-13 18:11:07",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 848,
                                "matricula": "20111",
                                "name": "Jorge Luis Pérez Ruiz",
                                "email": "jorge_1ruiz@hotmail.com",
                                "telefono": "54607212",
                                "nickname": "Jorge Junior",
                                "_code": "GUA-592-3pL",
                                "created_at": "2018-06-13 18:21:21",
                                "updated_at": "2018-06-13 18:21:21",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 849,
                                "matricula": "10892",
                                "name": "Andrea de lso angeles Chavarria Umaña",
                                "email": "andreamedcr@gmail.com",
                                "telefono": "88173265",
                                "nickname": "Andreachaucr",
                                "_code": "COR-249-byn",
                                "created_at": "2018-06-13 18:29:35",
                                "updated_at": "2018-06-13 19:05:38",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 850,
                                "matricula": "3088",
                                "name": "Francisco Javier Rodriguez Medal",
                                "email": "gustarod@gmail.com",
                                "telefono": "88838701",
                                "nickname": "medrodriguez",
                                "_code": "NIC-021-LZP",
                                "created_at": "2018-06-13 18:48:44",
                                "updated_at": "2018-06-13 18:48:44",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 851,
                                "matricula": "7147",
                                "name": "RUÍZ GARCIA, FLOR DE MARIA",
                                "email": "arq.victorperezruiz@gmail.com",
                                "telefono": "55984410",
                                "nickname": "Flor De María Ruiz",
                                "_code": "GUA-790-h5L",
                                "created_at": "2018-06-13 18:55:30",
                                "updated_at": "2018-06-13 18:55:30",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 852,
                                "matricula": "14586",
                                "name": "CASTILLO CASTRO ROCIO ADALGIZA",
                                "email": "doctorarociocastillo@gmail.com",
                                "telefono": "56913422",
                                "nickname": "Reyna",
                                "_code": "GUA-216-YDm",
                                "created_at": "2018-06-13 19:04:00",
                                "updated_at": "2018-06-13 20:52:57",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 853,
                                "matricula": "8134",
                                "name": "RAMIREZ MONTENEGRO LEONEL ANTONIO",
                                "email": "leoram_chey@yahoo.com",
                                "telefono": "54120504",
                                "nickname": "leo",
                                "_code": "GUA-084-gTn",
                                "created_at": "2018-06-13 19:07:50",
                                "updated_at": "2018-06-14 19:26:45",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 854,
                                "matricula": "1724",
                                "name": "KOGEL HUGNES STEVEN",
                                "email": "ledavargas51@gmail.com",
                                "telefono": "83884940",
                                "nickname": "kogel",
                                "_code": "COR-129-tdd",
                                "created_at": "2018-06-13 19:16:53",
                                "updated_at": "2018-06-13 19:16:53",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 855,
                                "matricula": "10829",
                                "name": "RAMIREZ ALFARO TOMAS FRANCISCO",
                                "email": "framirezamd@yahoo.com",
                                "telefono": "59667691",
                                "nickname": "FRANCISCO",
                                "_code": "GUA-922-qOO",
                                "created_at": "2018-06-13 19:19:19",
                                "updated_at": "2018-06-13 19:19:19",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 856,
                                "matricula": "4453",
                                "name": "JUAREZ JUAREZ GLICERIO ENRIQUE",
                                "email": "gliceriojuarez@yahoo.com",
                                "telefono": "502-51172572",
                                "nickname": "Cheyo",
                                "_code": "GUA-501-5TI",
                                "created_at": "2018-06-13 19:20:14",
                                "updated_at": "2018-06-13 19:20:14",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 857,
                                "matricula": "15465",
                                "name": "NAVARRETE DE FLORES CATIA IVONNE",
                                "email": "catiamichell@hotmail.com",
                                "telefono": "22934661-77992419",
                                "nickname": "caty",
                                "_code": "SAL-393-olR",
                                "created_at": "2018-06-13 19:27:15",
                                "updated_at": "2018-06-13 19:27:15",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 858,
                                "matricula": "8962",
                                "name": "VALVERDE ALFARO ELMER",
                                "email": "elmervcr@gmail.com",
                                "telefono": "83466408",
                                "nickname": "Elmerva",
                                "_code": "COR-853-1PG",
                                "created_at": "2018-06-13 19:40:27",
                                "updated_at": "2018-06-13 19:40:27",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 859,
                                "matricula": "5823",
                                "name": "ARRIVILLAGA DUBÓN, JUAN RICARDO",
                                "email": "juan1r@yahoo.com",
                                "telefono": "54020862",
                                "nickname": "Ricardo",
                                "_code": "GUA-875-LMh",
                                "created_at": "2018-06-13 19:41:24",
                                "updated_at": "2018-06-13 19:41:24",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 860,
                                "matricula": "7135",
                                "name": "Rauda Olmedo Mario Antonio",
                                "email": "raudamazate@yahoo.com",
                                "telefono": "78724070 - 54147203",
                                "nickname": "Mario Rauda",
                                "_code": "GUA-113-dIE",
                                "created_at": "2018-06-13 19:45:07",
                                "updated_at": "2018-06-13 19:45:07",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 861,
                                "matricula": "12891",
                                "name": "TZIC ALVAREZ DE FRANCISCO KARINA",
                                "email": "claudikarin@hotmail.com",
                                "telefono": "57671428",
                                "nickname": "Karina de Francisco",
                                "_code": "GUA-325-kgg",
                                "created_at": "2018-06-13 19:46:33",
                                "updated_at": "2018-06-29 17:46:28",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 862,
                                "matricula": "2355",
                                "name": "Nidia Sofia Hernandez Veliz",
                                "email": "cdfmaya@hotmail.com",
                                "telefono": "59557414",
                                "nickname": "Sofiahv",
                                "_code": "GUA-408-jCy",
                                "created_at": "2018-06-13 19:52:19",
                                "updated_at": "2018-06-13 19:52:19",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 863,
                                "matricula": "13262",
                                "name": "CARLOS JOSE FRANCISCO GUERRERO ALVAREZ",
                                "email": "drfguerrero@hotmail.com",
                                "telefono": "50182286",
                                "nickname": "francisco",
                                "_code": "GUA-333-wMS",
                                "created_at": "2018-06-13 19:53:49",
                                "updated_at": "2018-06-13 19:53:49",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 864,
                                "matricula": "7713",
                                "name": "REYES REYES  CARLOS  FERNANDO",
                                "email": "drcarlos.reyes@gmail.com",
                                "telefono": "41518044",
                                "nickname": "Carlos Reyes",
                                "_code": "GUA-949-QmP",
                                "created_at": "2018-06-13 20:02:28",
                                "updated_at": "2018-06-13 20:02:28",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 865,
                                "matricula": "13727",
                                "name": "RIVERA  MENDEZ MARIA JOSE",
                                "email": "dra.mariajose16@hotmail.com",
                                "telefono": "42151060",
                                "nickname": "dra.mariajose16@hotmail.com",
                                "_code": "GUA-726-HVb",
                                "created_at": "2018-06-13 20:07:41",
                                "updated_at": "2018-06-13 20:07:41",
                                "puntos": 65
                            }
                        },
                        {
                            "user": {
                                "id": 866,
                                "matricula": "11294",
                                "name": "SOTO  IBAÑEZ  ISELA  ARLENE",
                                "email": "aselaasi@yahoo.es",
                                "telefono": "56945349",
                                "nickname": "manchas",
                                "_code": "GUA-388-BrO",
                                "created_at": "2018-06-13 20:19:40",
                                "updated_at": "2018-06-13 20:19:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 867,
                                "matricula": "10157",
                                "name": "Catia Alas",
                                "email": "dracatiaalas13@gmail.com",
                                "telefono": "41517961",
                                "nickname": "Catia",
                                "_code": "GUA-125-yVQ",
                                "created_at": "2018-06-13 20:25:48",
                                "updated_at": "2018-06-13 20:25:48",
                                "puntos": 146
                            }
                        },
                        {
                            "user": {
                                "id": 868,
                                "matricula": "46055",
                                "name": "Diego Cuzcano Rivera",
                                "email": "garciahueck2309@gmail.com",
                                "telefono": "84579628",
                                "nickname": "Dcuzcano",
                                "_code": "NIC-711-Y1y",
                                "created_at": "2018-06-13 20:26:30",
                                "updated_at": "2018-06-13 20:26:30",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 869,
                                "matricula": "8850",
                                "name": "Javier armando avila paz",
                                "email": "javiarmando66@gmail.com",
                                "telefono": "504 31775497",
                                "nickname": "Javi66",
                                "_code": "HON-100-HyU",
                                "created_at": "2018-06-13 20:36:58",
                                "updated_at": "2018-06-13 20:49:41",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 870,
                                "matricula": "1882",
                                "name": "ARIAS CHAVES JUAN CARLOS",
                                "email": "karelosc@gmail.com",
                                "telefono": "24601248",
                                "nickname": "Juan Carlos",
                                "_code": "COR-323-OhT",
                                "created_at": "2018-06-13 20:39:28",
                                "updated_at": "2018-06-13 20:39:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 871,
                                "matricula": "8722",
                                "name": "SIERRA DIAZ RITA IZABEL",
                                "email": "ritasierrapediatra@gmail.com",
                                "telefono": "55164577",
                                "nickname": "Rita",
                                "_code": "GUA-908-1YH",
                                "created_at": "2018-06-13 20:40:11",
                                "updated_at": "2018-06-13 20:40:11",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 872,
                                "matricula": "4171",
                                "name": "Luis Cordón León",
                                "email": "fullmosh@hotmail.com",
                                "telefono": "40490774",
                                "nickname": "LCordón",
                                "_code": "GUA-618-714",
                                "created_at": "2018-06-13 20:42:14",
                                "updated_at": "2018-06-13 20:42:14",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 873,
                                "matricula": "13440",
                                "name": "SOTZ SON JOSE AMILCAR",
                                "email": "joseamisotz@gmail.com",
                                "telefono": "50185635",
                                "nickname": "Amilcar Sotz",
                                "_code": "GUA-166-Cww",
                                "created_at": "2018-06-13 20:48:19",
                                "updated_at": "2018-06-13 20:48:19",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 874,
                                "matricula": "9418",
                                "name": "RUANO GADEA BILLY LENOIR",
                                "email": "billyruano@hotmail.es",
                                "telefono": "5206-5697",
                                "nickname": "SANJUANERO",
                                "_code": "GUA-420-FqO",
                                "created_at": "2018-06-13 20:51:47",
                                "updated_at": "2018-06-13 20:51:47",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 875,
                                "matricula": "8280",
                                "name": "Evelyn Aracely Contreras Romero",
                                "email": "mariobobadillag@gmail.com",
                                "telefono": "97737216",
                                "nickname": "Evelyn CR",
                                "_code": "HON-790-jNv",
                                "created_at": "2018-06-13 20:53:06",
                                "updated_at": "2018-06-13 20:53:06",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 876,
                                "matricula": "48822",
                                "name": "Emigdio Suárez",
                                "email": "emigdio108@hotmail.com",
                                "telefono": "84657848",
                                "nickname": "Emigdiodent",
                                "_code": "NIC-948-n7u",
                                "created_at": "2018-06-13 20:55:39",
                                "updated_at": "2018-06-13 20:55:39",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 877,
                                "matricula": "13207",
                                "name": "Kensy Liliana Córdova Alvarez",
                                "email": "lilianacordova08@hotmail.com",
                                "telefono": "8738-2493",
                                "nickname": "Lili_7",
                                "_code": "HON-515-aEi",
                                "created_at": "2018-06-13 20:56:24",
                                "updated_at": "2018-06-13 20:56:24",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 878,
                                "matricula": "1882",
                                "name": "ARIAS CHAVES JUAN CARLOS",
                                "email": "karelosc2018@gmail.com",
                                "telefono": "24601248",
                                "nickname": "juan carlos",
                                "_code": "COR-312-hrl",
                                "created_at": "2018-06-13 20:59:34",
                                "updated_at": "2018-06-13 20:59:34",
                                "puntos": 42
                            }
                        },
                        {
                            "user": {
                                "id": 879,
                                "matricula": "11514",
                                "name": "BERDUO SANJUAN OTTO RENE",
                                "email": "drottoberduo@yahoo.com",
                                "telefono": "5750494",
                                "nickname": "Ottis",
                                "_code": "GUA-997-kF9",
                                "created_at": "2018-06-13 21:02:16",
                                "updated_at": "2018-06-13 21:02:16",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 880,
                                "matricula": "4377",
                                "name": "Leguizamon Velandia Edgar",
                                "email": "dalegsant@gmail.com",
                                "telefono": "60082882",
                                "nickname": "Legui007",
                                "_code": "COR-264-Qry",
                                "created_at": "2018-06-13 21:02:44",
                                "updated_at": "2018-06-13 21:02:44",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 881,
                                "matricula": "12611",
                                "name": "LEMUS CASTILLO LORNA LILIANA",
                                "email": "lornalemus@hotmail.com",
                                "telefono": "50185635",
                                "nickname": "Lorna Lemus",
                                "_code": "GUA-677-ueF",
                                "created_at": "2018-06-13 21:05:31",
                                "updated_at": "2018-06-13 21:05:31",
                                "puntos": 116
                            }
                        },
                        {
                            "user": {
                                "id": 882,
                                "matricula": "10481",
                                "name": "Soraya",
                                "email": "sgranizolopez@yahoo.com",
                                "telefono": "87653737",
                                "nickname": "grani",
                                "_code": "NIC-166-rvM",
                                "created_at": "2018-06-13 21:07:45",
                                "updated_at": "2018-06-13 21:07:45",
                                "puntos": 25
                            }
                        },
                        {
                            "user": {
                                "id": 883,
                                "matricula": "41271868",
                                "name": "Felix Javier Mejia Napky",
                                "email": "fejamena@gmail.com",
                                "telefono": "+50499958966",
                                "nickname": "Fejamena",
                                "_code": "HON-443-GpF",
                                "created_at": "2018-06-13 21:09:09",
                                "updated_at": "2018-06-13 21:09:09",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 884,
                                "matricula": "4017",
                                "name": "CANTON BENITEZ CARLOS FEDERICO",
                                "email": "carcanton@gmail.com",
                                "telefono": "5708 7679",
                                "nickname": "tacuadog",
                                "_code": "GUA-166-NwV",
                                "created_at": "2018-06-13 21:12:26",
                                "updated_at": "2018-06-13 21:12:26",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 885,
                                "matricula": "11457",
                                "name": "ALVARADO PASOS CÉSAR AUGUSTO",
                                "email": "ecomed121@hotmail.com",
                                "telefono": "55512182",
                                "nickname": "CAAP",
                                "_code": "GUA-687-CLF",
                                "created_at": "2018-06-13 21:13:02",
                                "updated_at": "2018-06-21 01:03:48",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 886,
                                "matricula": "8635",
                                "name": "JOSE ALBERTO LIZARME IBAÑEZ",
                                "email": "jlizarme73@gmail.com",
                                "telefono": "88420068",
                                "nickname": "JALI8635",
                                "_code": "COR-039-Lyd",
                                "created_at": "2018-06-13 21:18:43",
                                "updated_at": "2018-06-13 21:18:43",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 887,
                                "matricula": "11.549",
                                "name": "Claudia Maria Barreno Lopez",
                                "email": "draclaudiabarreno@gmail.com",
                                "telefono": "57046687",
                                "nickname": "Claudia Barreno",
                                "_code": "GUA-004-xWe",
                                "created_at": "2018-06-13 21:19:35",
                                "updated_at": "2018-06-13 21:19:35",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 888,
                                "matricula": "5957",
                                "name": "PONCE CHEVEZ KELIN MARIA",
                                "email": "marvinmejia2001@yahoo.com",
                                "telefono": "96204424",
                                "nickname": "kelin",
                                "_code": "HON-799-4M6",
                                "created_at": "2018-06-13 21:39:48",
                                "updated_at": "2018-06-13 21:39:48",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 889,
                                "matricula": "6188",
                                "name": "SAMAYOA  LOPEZ   JUAN  CARLOS",
                                "email": "juanksalo@hotmail.com",
                                "telefono": "55899740",
                                "nickname": "CHICOY",
                                "_code": "GUA-929-SKC",
                                "created_at": "2018-06-13 21:45:43",
                                "updated_at": "2018-06-13 21:45:43",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 890,
                                "matricula": "3219",
                                "name": "PAZOS RUIZ CARLOS ROBERTO",
                                "email": "fernandozeagt@gmail.com",
                                "telefono": "79487118-79480613",
                                "nickname": "FERNANDO",
                                "_code": "GUA-448-8EA",
                                "created_at": "2018-06-13 21:51:37",
                                "updated_at": "2018-06-13 21:51:37",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 891,
                                "matricula": "19744",
                                "name": "Yohanys Maria Zubizarreta Vega",
                                "email": "zubizarretay@gmail.com",
                                "telefono": "33053376",
                                "nickname": "Yohanys Maria Zubizarreta Vega",
                                "_code": "GUA-303-SP9",
                                "created_at": "2018-06-13 21:54:47",
                                "updated_at": "2018-06-13 21:54:47",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 892,
                                "matricula": "12762",
                                "name": "Darío Josué Castro Alvarenga",
                                "email": "dariojc90@hotmail.com",
                                "telefono": "32458534",
                                "nickname": "DCASTRO90",
                                "_code": "HON-779-mWJ",
                                "created_at": "2018-06-13 22:24:08",
                                "updated_at": "2018-06-13 22:24:08",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 893,
                                "matricula": "5875",
                                "name": "GAMBOA RAMOS FREDY",
                                "email": "freddygamboa2@gmail.com",
                                "telefono": "59510119",
                                "nickname": "tigre",
                                "_code": "GUA-298-mmv",
                                "created_at": "2018-06-13 22:24:21",
                                "updated_at": "2018-06-13 22:24:21",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 894,
                                "matricula": "6081",
                                "name": "HENRIQUEZ ORDOÑEZ RAMON ADOLFO",
                                "email": "rahoz35@yahoo.es",
                                "telefono": "99047613",
                                "nickname": "el topo",
                                "_code": "HON-596-EjS",
                                "created_at": "2018-06-13 22:30:58",
                                "updated_at": "2018-06-13 22:30:58",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 895,
                                "matricula": "2070",
                                "name": "CAMBELL ZUNIGA LEONEL",
                                "email": "leonel.campbell@gmail.com",
                                "telefono": "9982-9945",
                                "nickname": "Dr.LC",
                                "_code": "HON-325-tPI",
                                "created_at": "2018-06-13 22:32:25",
                                "updated_at": "2018-06-14 02:04:58",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 896,
                                "matricula": "13172",
                                "name": "ECHEVERRIA CIFUENTES FATIMA MARIA",
                                "email": "fatima.echeverria09@gmail.com",
                                "telefono": "42149749",
                                "nickname": "Fa",
                                "_code": "GUA-341-H6n",
                                "created_at": "2018-06-13 22:38:43",
                                "updated_at": "2018-06-30 03:44:02",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 897,
                                "matricula": "7103",
                                "name": "Jacobo joel arguello handres",
                                "email": "jjah020582@yahoo.com",
                                "telefono": "94937141",
                                "nickname": "Jjarguello",
                                "_code": "HON-782-PLa",
                                "created_at": "2018-06-13 22:39:38",
                                "updated_at": "2018-06-29 04:18:00",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 898,
                                "matricula": "21121113711",
                                "name": "Erick Guillén",
                                "email": "guillenpacheko@gmail.com",
                                "telefono": "33676519",
                                "nickname": "Erick",
                                "_code": "HON-647-j29",
                                "created_at": "2018-06-13 22:39:48",
                                "updated_at": "2018-06-13 22:39:48",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 899,
                                "matricula": "9397",
                                "name": "CHOC RODOLFO",
                                "email": "fitochoc65@gmail.com",
                                "telefono": "59669354",
                                "nickname": "GUA-138-QL4",
                                "_code": "GUA-138-QL4",
                                "created_at": "2018-06-13 22:43:40",
                                "updated_at": "2018-06-13 22:43:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 900,
                                "matricula": "11511",
                                "name": "Dra. Ana Luisa Ortiz Herrera",
                                "email": "luiisv.rotiz@gmail.com",
                                "telefono": "54254884",
                                "nickname": "Luiisv",
                                "_code": "GUA-302-46Q",
                                "created_at": "2018-06-13 22:43:56",
                                "updated_at": "2018-06-13 22:43:56",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 901,
                                "matricula": "6925",
                                "name": "VANEGAS ALVARADO JULIETA DEL ROSARIO",
                                "email": "julietalvarado15@gmail.com",
                                "telefono": "88846042",
                                "nickname": "July01",
                                "_code": "NIC-052-Jig",
                                "created_at": "2018-06-13 22:48:05",
                                "updated_at": "2018-06-13 22:48:05",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 902,
                                "matricula": "1589",
                                "name": "Berly Lizeth Rivera Lopez",
                                "email": "berlylizethrivera@gmail.com",
                                "telefono": "51816786",
                                "nickname": "Berly Lizeth Rivera Lopez",
                                "_code": "GUA-960-GA6",
                                "created_at": "2018-06-13 22:50:23",
                                "updated_at": "2018-06-13 22:50:23",
                                "puntos": 60
                            }
                        },
                        {
                            "user": {
                                "id": 903,
                                "matricula": "12208",
                                "name": "MENDOZA GONZALES SARA MARIA",
                                "email": "dra.saramachapin@hotmail.com",
                                "telefono": "30248405",
                                "nickname": "Sarama",
                                "_code": "GUA-083-Rpc",
                                "created_at": "2018-06-13 22:52:10",
                                "updated_at": "2018-06-13 22:52:10",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 904,
                                "matricula": "13538",
                                "name": "BAEZ SALABLANCA LITZA ARABELLE",
                                "email": "litzarabell@yahoo.com",
                                "telefono": "88280288",
                                "nickname": "Litza",
                                "_code": "NIC-162-s86",
                                "created_at": "2018-06-13 22:52:27",
                                "updated_at": "2018-06-13 22:52:27",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 905,
                                "matricula": "7452",
                                "name": "Alma Luz Nuñez Lagos",
                                "email": "almaluz16@yahoo.com",
                                "telefono": "50498627572",
                                "nickname": "almaluz16@yahoo.com",
                                "_code": "HON-448-7jf",
                                "created_at": "2018-06-13 23:03:56",
                                "updated_at": "2018-06-13 23:03:56",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 906,
                                "matricula": "6430",
                                "name": "GUZMAN BURGOS GUSTAVO AROLDO",
                                "email": "drgusguz@hotmail.es",
                                "telefono": "40911487",
                                "nickname": "Guzmanovich",
                                "_code": "GUA-924-fdC",
                                "created_at": "2018-06-13 23:06:03",
                                "updated_at": "2018-06-13 23:06:03",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 907,
                                "matricula": "9751",
                                "name": "JUAREZ ALDANA  HJALMAR DANIEL",
                                "email": "hjalmarj70@hotmail.com",
                                "telefono": "54606077",
                                "nickname": "DrHjalmar",
                                "_code": "GUA-818-KHF",
                                "created_at": "2018-06-13 23:08:08",
                                "updated_at": "2018-06-13 23:08:08",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 908,
                                "matricula": "7509",
                                "name": "Normin Donairo Sanchez Lezama",
                                "email": "norminlezama@yahoo.es",
                                "telefono": "98781003",
                                "nickname": "normin",
                                "_code": "Hon-101-slk",
                                "created_at": "2018-06-13 23:10:05",
                                "updated_at": "2018-06-13 23:10:05",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 909,
                                "matricula": "4731",
                                "name": "Adela Beatriz López",
                                "email": "ad7_b@hotmail.com",
                                "telefono": "78142610",
                                "nickname": "ANDINO",
                                "_code": "SAL-619-LIM",
                                "created_at": "2018-06-13 23:11:16",
                                "updated_at": "2018-06-13 23:11:16",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 910,
                                "matricula": "13323",
                                "name": "CASTANEDA CALACAN ALMA MARIA",
                                "email": "dra.alma.castaneda@gmail.com",
                                "telefono": "45993483",
                                "nickname": "Almi",
                                "_code": "GUA-235-pFQ",
                                "created_at": "2018-06-13 23:18:58",
                                "updated_at": "2018-06-13 23:18:58",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 911,
                                "matricula": "10282",
                                "name": "VALLE WILMER",
                                "email": "wilmer.valle@outlook.com",
                                "telefono": "9992-1345",
                                "nickname": "Wilmer Valle",
                                "_code": "HON-894-NbB",
                                "created_at": "2018-06-13 23:19:21",
                                "updated_at": "2018-06-13 23:19:21",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 912,
                                "matricula": "687",
                                "name": "OVALLE AGUILAR MARIO RODOLFO",
                                "email": "drmroa1929@gmail.com",
                                "telefono": "55283807",
                                "nickname": "Rodolfo",
                                "_code": "GUA-969-yi9",
                                "created_at": "2018-06-13 23:21:54",
                                "updated_at": "2018-06-13 23:21:54",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 913,
                                "matricula": "12651",
                                "name": "GUEVARA JUAN FERNANDO",
                                "email": "juanfer842003@yahoo.com.mx",
                                "telefono": "98428945",
                                "nickname": "Juanfer",
                                "_code": "HON-728-6AY",
                                "created_at": "2018-06-13 23:25:45",
                                "updated_at": "2018-06-13 23:25:45",
                                "puntos": 76
                            }
                        },
                        {
                            "user": {
                                "id": 914,
                                "matricula": "10536",
                                "name": "RIZO FAJARDO CARLOS ROBERTO",
                                "email": "crrizo@gmail.com",
                                "telefono": "50028339",
                                "nickname": "Dr. Rizo",
                                "_code": "GUA-837-NvP",
                                "created_at": "2018-06-13 23:26:31",
                                "updated_at": "2018-06-21 19:06:56",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 915,
                                "matricula": "2415",
                                "name": "CRUZ ANDINO VICTOR MANUEL",
                                "email": "vcruza23@yahoo.com",
                                "telefono": "504 22303901",
                                "nickname": "vimacasa1123",
                                "_code": "HON-970-ROO",
                                "created_at": "2018-06-13 23:29:25",
                                "updated_at": "2018-06-13 23:29:25",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 916,
                                "matricula": "4173",
                                "name": "ALVARDO PEREZ JULIO ROBERTO",
                                "email": "julioalperez57@hotmail.com",
                                "telefono": "57030955",
                                "nickname": "Bobby",
                                "_code": "GUA-897-dMz",
                                "created_at": "2018-06-13 23:36:55",
                                "updated_at": "2018-06-13 23:36:55",
                                "puntos": 66
                            }
                        },
                        {
                            "user": {
                                "id": 917,
                                "matricula": "16744",
                                "name": "REYES CORZANTES LIONEL ALEJANDRO",
                                "email": "lionel23.4@gmail.com",
                                "telefono": "54820658",
                                "nickname": "Lionel",
                                "_code": "GUA-652-Z5A",
                                "created_at": "2018-06-13 23:43:34",
                                "updated_at": "2018-06-13 23:43:34",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 918,
                                "matricula": "9169",
                                "name": "JOSE CASTRO SOPHIE HERMOSA",
                                "email": "drsophiej@gmail.com",
                                "telefono": "(504)95168250",
                                "nickname": "Chepito",
                                "_code": "HON-233-TLH",
                                "created_at": "2018-06-13 23:48:19",
                                "updated_at": "2018-06-13 23:48:19",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 919,
                                "matricula": "15912",
                                "name": "VALLADARES ASCENCIO PABLO DANIEL",
                                "email": "pd20212003@yaho.com",
                                "telefono": "74503554",
                                "nickname": "Doc",
                                "_code": "Sal-955-CIH",
                                "created_at": "2018-06-13 23:51:11",
                                "updated_at": "2018-06-13 23:51:11",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 920,
                                "matricula": "16068",
                                "name": "Roberto Antonio Pérez",
                                "email": "pianogood@yahoo.com",
                                "telefono": "54604653",
                                "nickname": "pianogood@yahoo.com",
                                "_code": "GUA-679-7hK",
                                "created_at": "2018-06-13 23:51:42",
                                "updated_at": "2018-06-13 23:51:42",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 921,
                                "matricula": "8159",
                                "name": "MAGAÑA CASTRO CLAUDIA FLOR DE MARÍA",
                                "email": "erick.rosales7.er@gmail.com",
                                "telefono": "54076073",
                                "nickname": "Claudia Magaña",
                                "_code": "GUA-215-PgX",
                                "created_at": "2018-06-14 00:09:07",
                                "updated_at": "2018-06-14 00:09:07",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 922,
                                "matricula": "17024",
                                "name": "LOPEZ AGUILAR RONALD ESTEBAN",
                                "email": "drlopez107@gmail.com",
                                "telefono": "505-88847275",
                                "nickname": "Ronald",
                                "_code": "NIC-814-vOW",
                                "created_at": "2018-06-14 00:10:45",
                                "updated_at": "2018-06-14 00:10:45",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 923,
                                "matricula": "1394",
                                "name": "Nain Eusebio Ramos Palma",
                                "email": "djesyyolany@yahoo.com",
                                "telefono": "98514883",
                                "nickname": "NRAMOS",
                                "_code": "HON-755-urj",
                                "created_at": "2018-06-14 00:10:59",
                                "updated_at": "2018-06-14 00:10:59",
                                "puntos": 69
                            }
                        },
                        {
                            "user": {
                                "id": 924,
                                "matricula": "8515",
                                "name": "CERDAS CHACON JUAN MIGUEL",
                                "email": "drjmcerdas@gmail.com",
                                "telefono": "83022624",
                                "nickname": "JuanDe",
                                "_code": "COR-026-oNL",
                                "created_at": "2018-06-14 00:13:06",
                                "updated_at": "2018-06-14 00:13:06",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 925,
                                "matricula": "8838",
                                "name": "RAMOS JUAREZ ORLANDO RODOLFO",
                                "email": "orlandoramosj52@gmail.com",
                                "telefono": "57107141",
                                "nickname": "Lando",
                                "_code": "GUA-111-OxR",
                                "created_at": "2018-06-14 00:22:31",
                                "updated_at": "2018-06-14 00:22:31",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 926,
                                "matricula": "4434",
                                "name": "MARIO CARRILLO",
                                "email": "drcarrillo56@gmail.com",
                                "telefono": "57081409",
                                "nickname": "MARIO",
                                "_code": "GUA-381-Jmp",
                                "created_at": "2018-06-14 00:25:13",
                                "updated_at": "2018-06-14 00:25:13",
                                "puntos": 130
                            }
                        },
                        {
                            "user": {
                                "id": 927,
                                "matricula": "21570",
                                "name": "Grecia Brigitte Colindres Meda",
                                "email": "greciacmeda24@gmail.com",
                                "telefono": "41284759",
                                "nickname": "BRI",
                                "_code": "GUA-581-bVW",
                                "created_at": "2018-06-14 00:27:32",
                                "updated_at": "2018-06-14 00:36:17",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 928,
                                "matricula": "18212",
                                "name": "Indira Yannett Castillo Rivera",
                                "email": "castilloindira18212@gmail.com",
                                "telefono": "83727761",
                                "nickname": "INDY COOKIE",
                                "_code": "Nic-836-cQf",
                                "created_at": "2018-06-14 00:27:53",
                                "updated_at": "2018-06-14 00:27:53",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 929,
                                "matricula": "8274",
                                "name": "ROSALES MENDEZ DIONICIO",
                                "email": "dionicio_rm7@hotmail.com",
                                "telefono": "55210599",
                                "nickname": "Dionicio Rosales",
                                "_code": "GUA-044-u5q",
                                "created_at": "2018-06-14 00:28:14",
                                "updated_at": "2018-06-14 00:28:14",
                                "puntos": 127
                            }
                        },
                        {
                            "user": {
                                "id": 930,
                                "matricula": "15555",
                                "name": "JAVIER CORDOBA DUARTE",
                                "email": "ecor17@gmail.com",
                                "telefono": "88829402",
                                "nickname": "javier",
                                "_code": "COR-118-QtG",
                                "created_at": "2018-06-14 00:29:19",
                                "updated_at": "2018-06-14 00:29:19",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 931,
                                "matricula": "12896",
                                "name": "REDONDO CORRAL PEDRO MANUEL",
                                "email": "predondo@eegsa.net",
                                "telefono": "3016-0958",
                                "nickname": "Pedro",
                                "_code": "GUA-856-KOr",
                                "created_at": "2018-06-14 00:35:36",
                                "updated_at": "2018-06-14 00:35:36",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 932,
                                "matricula": "8407",
                                "name": "CERON quintanilla MARIO ORLANDO",
                                "email": "mceron.md@yahoo.com",
                                "telefono": "77992532",
                                "nickname": "mario ceron",
                                "_code": "SAL-567-q21",
                                "created_at": "2018-06-14 00:36:34",
                                "updated_at": "2018-06-14 00:36:34",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 933,
                                "matricula": "89",
                                "name": "Digna concepcion cruz ramirez",
                                "email": "dra.madridcruz@gmail.com",
                                "telefono": "504-99036650",
                                "nickname": "doctora",
                                "_code": "HON-089-aLd",
                                "created_at": "2018-06-14 00:42:52",
                                "updated_at": "2018-06-14 00:42:52",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 934,
                                "matricula": "8407",
                                "name": "CERON MARIO ORLANDO",
                                "email": "mceronmd@yahoo.com",
                                "telefono": "77992532",
                                "nickname": "mario ceron",
                                "_code": "SAL-351-bdQ",
                                "created_at": "2018-06-14 00:44:39",
                                "updated_at": "2018-06-14 00:44:39",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 935,
                                "matricula": "8838",
                                "name": "RAMOS JUAREZ ORLANDO RODOLFO",
                                "email": "sanatorioramos@hotmail.es",
                                "telefono": "57107141",
                                "nickname": "Lando",
                                "_code": "GUA-820-rHJ",
                                "created_at": "2018-06-14 00:44:57",
                                "updated_at": "2018-06-14 00:44:57",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 936,
                                "matricula": "4434",
                                "name": "MARIO CARRILLO",
                                "email": "drcarrillo56@yahoo.com",
                                "telefono": "57081409",
                                "nickname": "mario",
                                "_code": "GUA-477-TyJ",
                                "created_at": "2018-06-14 00:46:28",
                                "updated_at": "2018-06-14 00:46:28",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 937,
                                "matricula": "8863",
                                "name": "LIMA URREA, DELIA  ANABELLA",
                                "email": "sanalima41@gmail.com",
                                "telefono": "55148720",
                                "nickname": "DELIA LIMA",
                                "_code": "GUA-013-5OS",
                                "created_at": "2018-06-14 00:46:54",
                                "updated_at": "2018-06-14 00:46:54",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 938,
                                "matricula": "7525",
                                "name": "Ana Lorena Zamora López",
                                "email": "zamora.lorena@yahoo.ca",
                                "telefono": "2260-7856",
                                "nickname": "loreza",
                                "_code": "COR-988-0vS",
                                "created_at": "2018-06-14 00:52:06",
                                "updated_at": "2018-06-14 00:52:06",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 939,
                                "matricula": "10556",
                                "name": "William Lopez",
                                "email": "willylopezmd@gmail.com",
                                "telefono": "23347574",
                                "nickname": "Willy",
                                "_code": "GUA-938-lS9",
                                "created_at": "2018-06-14 00:54:42",
                                "updated_at": "2018-06-14 00:54:42",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 940,
                                "matricula": "7483",
                                "name": "oscar guerra caceres",
                                "email": "guerracaceresor@yahoo.es",
                                "telefono": "95688143",
                                "nickname": "guerramd",
                                "_code": "HON-008-QTn",
                                "created_at": "2018-06-14 00:54:43",
                                "updated_at": "2018-06-14 00:54:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 941,
                                "matricula": "7187",
                                "name": "BLANDINO RODRIGUEZ ROLANDO",
                                "email": "roarblanro@yahoo.com",
                                "telefono": "88812952",
                                "nickname": "azul y blanco",
                                "_code": "nic-059-1vw",
                                "created_at": "2018-06-14 00:56:32",
                                "updated_at": "2018-06-14 00:56:32",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 942,
                                "matricula": "8496",
                                "name": "RODAS MARTINEZ LUIS ARIEL",
                                "email": "luisarielito@gmail.com",
                                "telefono": "53183853",
                                "nickname": "raul",
                                "_code": "GUA-970-qqA",
                                "created_at": "2018-06-14 00:57:07",
                                "updated_at": "2018-06-14 00:57:07",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 943,
                                "matricula": "9440",
                                "name": "MELVIN RAMIREZ",
                                "email": "myro7@hotmail.com",
                                "telefono": "99373401",
                                "nickname": "melvinyovany",
                                "_code": "HON-013-3nF",
                                "created_at": "2018-06-14 00:58:03",
                                "updated_at": "2018-06-14 00:58:03",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 944,
                                "matricula": "9397",
                                "name": "CHOC RODOLFO",
                                "email": "fitochoc65@hotmail.com",
                                "telefono": "59669354",
                                "nickname": "Gato",
                                "_code": "GUA-843-7GS",
                                "created_at": "2018-06-14 01:01:21",
                                "updated_at": "2018-06-14 01:01:21",
                                "puntos": 119
                            }
                        },
                        {
                            "user": {
                                "id": 945,
                                "matricula": "6648",
                                "name": "ALVARADO ROMERO NELSON MANFREDO",
                                "email": "nel071177@outlook.com",
                                "telefono": "99626347",
                                "nickname": "Nelson alvarado",
                                "_code": "HON-644-Nk7",
                                "created_at": "2018-06-14 01:02:37",
                                "updated_at": "2018-06-14 01:02:37",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 946,
                                "matricula": "3089",
                                "name": "Ricardo Poggio",
                                "email": "ricardopoggio@yahoo.com",
                                "telefono": "52068538",
                                "nickname": "Poggio",
                                "_code": "GUA-174-evB",
                                "created_at": "2018-06-14 01:06:54",
                                "updated_at": "2018-06-14 01:06:54",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 947,
                                "matricula": "11911",
                                "name": "ALONSO CLAUDIA",
                                "email": "claudia.alonso@claro.com.gt",
                                "telefono": "42384196",
                                "nickname": "Dra. Alonso",
                                "_code": "GUA-601-Npt",
                                "created_at": "2018-06-14 01:11:26",
                                "updated_at": "2018-06-14 01:11:26",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 948,
                                "matricula": "5155",
                                "name": "CORZANTES SANTOS JEANETTE MILAGROS",
                                "email": "jeacorz@yahoo.com",
                                "telefono": "42110533",
                                "nickname": "Jeanette",
                                "_code": "GUA-142-UfM",
                                "created_at": "2018-06-14 01:12:03",
                                "updated_at": "2018-06-14 01:12:03",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 949,
                                "matricula": "15309",
                                "name": "Victor Armando Rodríguez López",
                                "email": "victorarl@hotmail.com",
                                "telefono": "47004798",
                                "nickname": "chato",
                                "_code": "GUA-117-7bi",
                                "created_at": "2018-06-14 01:21:54",
                                "updated_at": "2018-06-14 08:57:02",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 950,
                                "matricula": "13051",
                                "name": "Amilcar Jahir Nuñez Castro",
                                "email": "ajnc2009@gmail.com",
                                "telefono": "8733-7151",
                                "nickname": "Amirukaru",
                                "_code": "HON-924-DoE",
                                "created_at": "2018-06-14 01:26:35",
                                "updated_at": "2018-06-14 01:26:35",
                                "puntos": 31
                            }
                        },
                        {
                            "user": {
                                "id": 951,
                                "matricula": "14852",
                                "name": "Andrea Urbina Guzmán",
                                "email": "dra.urbinaguzman@gmail.com",
                                "telefono": "87058774",
                                "nickname": "Andre",
                                "_code": "COR-031-3AG",
                                "created_at": "2018-06-14 01:27:50",
                                "updated_at": "2018-06-14 01:27:50",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 952,
                                "matricula": "15405",
                                "name": "RODRIGUEZ CUELLAR OSCAR STANLEY",
                                "email": "stanrocu@gmail.com",
                                "telefono": "77941080",
                                "nickname": "stanrocu",
                                "_code": "SAL-392-prR",
                                "created_at": "2018-06-14 01:31:04",
                                "updated_at": "2018-06-14 01:31:04",
                                "puntos": 108
                            }
                        },
                        {
                            "user": {
                                "id": 953,
                                "matricula": "7486",
                                "name": "Oscar Guerra",
                                "email": "oscarguerra476@gmail.com",
                                "telefono": "95688143",
                                "nickname": "GuroMD",
                                "_code": "HON-411-V9Y",
                                "created_at": "2018-06-14 01:33:39",
                                "updated_at": "2018-06-14 01:33:39",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 954,
                                "matricula": "9116",
                                "name": "LOPEZ CANO MARIA ISABEL",
                                "email": "belisa.lopez@gmail.com",
                                "telefono": "86341041",
                                "nickname": "Mary",
                                "_code": "NIC-425-7X3",
                                "created_at": "2018-06-14 01:37:32",
                                "updated_at": "2018-06-14 01:37:32",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 955,
                                "matricula": "6623",
                                "name": "PINTO CALDERON MANUEL ELIAS",
                                "email": "arlentoti@hotmail.com",
                                "telefono": "55958926",
                                "nickname": "MaPi",
                                "_code": "GUA-189-sjz",
                                "created_at": "2018-06-14 01:39:04",
                                "updated_at": "2018-06-14 01:39:04",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 956,
                                "matricula": "8289",
                                "name": "Arias Muñoz Luis",
                                "email": "larias1610@gmail.com",
                                "telefono": "22604636",
                                "nickname": "dr.arias",
                                "_code": "COR-193-CXi",
                                "created_at": "2018-06-14 01:43:43",
                                "updated_at": "2018-06-27 02:30:55",
                                "puntos": 124
                            }
                        },
                        {
                            "user": {
                                "id": 957,
                                "matricula": "8259",
                                "name": "NAJERA GONZALEZ  MARLEN EUGENIA",
                                "email": "marlenflorecita@yahoo.com",
                                "telefono": "57177827",
                                "nickname": "marlen",
                                "_code": "GUA-049-BJK",
                                "created_at": "2018-06-14 01:53:49",
                                "updated_at": "2018-06-14 01:53:49",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 958,
                                "matricula": "11302",
                                "name": "Franklin Jared Caballero Aviles",
                                "email": "frankx-005@hotmail.com",
                                "telefono": "31750097",
                                "nickname": "Frank",
                                "_code": "HON-530-VW5",
                                "created_at": "2018-06-14 02:04:15",
                                "updated_at": "2018-06-14 02:04:15",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 959,
                                "matricula": "7353",
                                "name": "MELGAR OLIVEROS, MARIA TERESA",
                                "email": "melgarteresita@yahoo.es",
                                "telefono": "54131490",
                                "nickname": "teresita",
                                "_code": "GUA-433-fMg",
                                "created_at": "2018-06-14 02:06:28",
                                "updated_at": "2018-06-14 02:06:28",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 960,
                                "matricula": "17073",
                                "name": "Griselda Marisol Castellanos Funes",
                                "email": "marisolzavala@gmail.com",
                                "telefono": "61115404",
                                "nickname": "Mary",
                                "_code": "SAL-188-v5A",
                                "created_at": "2018-06-14 02:08:06",
                                "updated_at": "2018-06-14 02:08:06",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 961,
                                "matricula": "7652",
                                "name": "Daiyana Rodriguez Porras",
                                "email": "daiyanarodri@hotmail.com",
                                "telefono": "63073650",
                                "nickname": "Dai",
                                "_code": "COR-037-NNZ",
                                "created_at": "2018-06-14 02:13:23",
                                "updated_at": "2018-06-14 02:13:23",
                                "puntos": 125
                            }
                        },
                        {
                            "user": {
                                "id": 962,
                                "matricula": "16312",
                                "name": "Guillermo Dominguez",
                                "email": "gadh55@yahoo.es",
                                "telefono": "58443728",
                                "nickname": "Golazo",
                                "_code": "GUA-108-6Vd",
                                "created_at": "2018-06-14 02:18:26",
                                "updated_at": "2018-06-14 02:18:26",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 963,
                                "matricula": "8919",
                                "name": "Jose Amadeo Maradiaga",
                                "email": "josemara87@yahoo.es",
                                "telefono": "97420511",
                                "nickname": "MjoseM",
                                "_code": "HON-733-fDz",
                                "created_at": "2018-06-14 02:20:17",
                                "updated_at": "2018-07-01 21:24:13",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 964,
                                "matricula": "11834",
                                "name": "PETZEY MEJIA EDGAR DANILO",
                                "email": "epetzey@gmail.com",
                                "telefono": "58536199",
                                "nickname": "epetzey",
                                "_code": "GUA-277-j5a",
                                "created_at": "2018-06-14 02:23:13",
                                "updated_at": "2018-06-14 02:23:13",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 965,
                                "matricula": "1443",
                                "name": "VETORAZZI  SARAVIA  JUAN DE DIOS",
                                "email": "jdvetto@yahoo.es",
                                "telefono": "54095322",
                                "nickname": "JUAN DE DIOS",
                                "_code": "GUA-403-Z4u",
                                "created_at": "2018-06-14 02:25:17",
                                "updated_at": "2018-06-14 04:37:58",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 966,
                                "matricula": "9924",
                                "name": "ARAGON TORRES BRYAN FERNANDO",
                                "email": "br_aragon@hotmail.com",
                                "telefono": "88100511",
                                "nickname": "bryanfer1414",
                                "_code": "HON-315-kQs",
                                "created_at": "2018-06-14 02:25:30",
                                "updated_at": "2018-06-14 02:25:30",
                                "puntos": 68
                            }
                        },
                        {
                            "user": {
                                "id": 967,
                                "matricula": "4604",
                                "name": "DE DIOS MATHEU JOSE IBRAIM",
                                "email": "josuedm_1126@hotmail.com",
                                "telefono": "97419000",
                                "nickname": "josue",
                                "_code": "HON-908-Sat",
                                "created_at": "2018-06-14 02:28:11",
                                "updated_at": "2018-06-14 02:28:11",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 968,
                                "matricula": "33688",
                                "name": "Jessie Yeaninne Lazo López",
                                "email": "drjylazo@hotmail.com",
                                "telefono": "85651173",
                                "nickname": "Jessie",
                                "_code": "NIC-252-kHI",
                                "created_at": "2018-06-14 02:30:32",
                                "updated_at": "2018-06-14 02:30:32",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 969,
                                "matricula": "14832",
                                "name": "ALVAREZ MARTINEZ,  JOSE EDUARDO",
                                "email": "drjosealvareztrauma@gmail.com",
                                "telefono": "41493525",
                                "nickname": "bender3000gt",
                                "_code": "GUA-895-2LC",
                                "created_at": "2018-06-14 02:31:19",
                                "updated_at": "2018-06-23 02:45:18",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 970,
                                "matricula": "6422",
                                "name": "DIAZ CRUZ WILBURG",
                                "email": "wilburg_a@yahoo.es",
                                "telefono": "83283696",
                                "nickname": "wilburg",
                                "_code": "COR-308-3PB",
                                "created_at": "2018-06-14 02:31:43",
                                "updated_at": "2018-06-14 02:31:43",
                                "puntos": 126
                            }
                        },
                        {
                            "user": {
                                "id": 971,
                                "matricula": "10591",
                                "name": "CASTILLO SEGURA YANELLY MARIA",
                                "email": "dra.yanellycastillo@hotmail.com",
                                "telefono": "83 77 52 15",
                                "nickname": "Princesa",
                                "_code": "COR-599-u0Z",
                                "created_at": "2018-06-14 02:34:27",
                                "updated_at": "2018-06-14 02:34:27",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 972,
                                "matricula": "5514",
                                "name": "SIPAQUE ZELADA FERMIN GUSTAVO",
                                "email": "fermin.s.zelada@gmail.com",
                                "telefono": "59191995",
                                "nickname": "Sipaque",
                                "_code": "GUA-361-4kj",
                                "created_at": "2018-06-14 02:38:53",
                                "updated_at": "2018-06-14 02:38:53",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 973,
                                "matricula": "11.309",
                                "name": "Hiram Roberto Funez Montejo",
                                "email": "drhirofumo@hotmail.com",
                                "telefono": "55923985",
                                "nickname": "Hiram Funez",
                                "_code": "GUA-491-k7S",
                                "created_at": "2018-06-14 02:38:53",
                                "updated_at": "2018-06-14 02:38:53",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 974,
                                "matricula": "7931",
                                "name": "MARIN CARMONA DIXON",
                                "email": "drdmarin6@hotmail.com",
                                "telefono": "87683077",
                                "nickname": "Dixon",
                                "_code": "COR-328-sea",
                                "created_at": "2018-06-14 02:39:00",
                                "updated_at": "2018-06-14 02:39:00",
                                "puntos": 84
                            }
                        },
                        {
                            "user": {
                                "id": 975,
                                "matricula": "20719",
                                "name": "BARRERA ECHEGOYEN MARJORIE RAFAELA",
                                "email": "marabae@gmail.com",
                                "telefono": "83723162",
                                "nickname": "Mar",
                                "_code": "NIC-902-yLG",
                                "created_at": "2018-06-14 02:41:38",
                                "updated_at": "2018-06-14 02:41:38",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 976,
                                "matricula": "12934",
                                "name": "BATEN SAC BAIRON",
                                "email": "sansebastianespecialidades@gmail.com",
                                "telefono": "31462448",
                                "nickname": "baten\'s",
                                "_code": "GUA-418-nux",
                                "created_at": "2018-06-14 02:47:33",
                                "updated_at": "2018-06-14 02:47:33",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 977,
                                "matricula": "1886",
                                "name": "GONZÁLEZ SCHAW JULIO ROBERTO",
                                "email": "jrgschaw@hotmail.com",
                                "telefono": "55067813",
                                "nickname": "JulioRoberto Gonzalez Schaw",
                                "_code": "GUA-393-YXP",
                                "created_at": "2018-06-14 02:49:44",
                                "updated_at": "2018-06-14 02:49:44",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 978,
                                "matricula": "11383",
                                "name": "MORAN DEL AGUILA SOFIA ALBERTINA",
                                "email": "sofiaalbertinamoran@gmail.com",
                                "telefono": "58050801",
                                "nickname": "Sofia",
                                "_code": "GUA-227-CUz",
                                "created_at": "2018-06-14 02:51:14",
                                "updated_at": "2018-06-14 02:51:14",
                                "puntos": 41
                            }
                        },
                        {
                            "user": {
                                "id": 979,
                                "matricula": "4914",
                                "name": "VALLE MORALES MANUEL EMILIO",
                                "email": "valle_emilio@yahoo.com",
                                "telefono": "47684125",
                                "nickname": "Dr. Manuel Valle",
                                "_code": "GUA-158-gTI",
                                "created_at": "2018-06-14 02:54:00",
                                "updated_at": "2018-06-14 02:54:00",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 980,
                                "matricula": "7091",
                                "name": "SANCHEZ JOHANNES",
                                "email": "drjohansanchez@yahoo.com",
                                "telefono": "(504) 32425710",
                                "nickname": "Johansanchez",
                                "_code": "HON-824-PGI",
                                "created_at": "2018-06-14 02:54:30",
                                "updated_at": "2018-06-14 02:54:30",
                                "puntos": 106
                            }
                        },
                        {
                            "user": {
                                "id": 981,
                                "matricula": "13111714719",
                                "name": "Gladys Yareli Ramirez",
                                "email": "yaya_ramirez14@yahoo.com",
                                "telefono": "98655045",
                                "nickname": "Yaya",
                                "_code": "HON-432-1xu",
                                "created_at": "2018-06-14 02:57:05",
                                "updated_at": "2018-06-14 02:57:05",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 982,
                                "matricula": "12289",
                                "name": "COBOX AGUILAR OLIVER ROLANDO",
                                "email": "neurologiacobox@gmail.com",
                                "telefono": "7764-9505/ 5321-1442",
                                "nickname": "toliviejo",
                                "_code": "GUA-753-RBz",
                                "created_at": "2018-06-14 03:00:28",
                                "updated_at": "2018-06-14 09:53:14",
                                "puntos": 30
                            }
                        },
                        {
                            "user": {
                                "id": 983,
                                "matricula": "10674",
                                "name": "Nestor David Matamoros Raudales",
                                "email": "nestordavidmatamorosraudales@gmail.com",
                                "telefono": "94589899",
                                "nickname": "Nestor",
                                "_code": "HON-836-eh2",
                                "created_at": "2018-06-14 03:01:49",
                                "updated_at": "2018-06-14 03:01:49",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 984,
                                "matricula": "4607",
                                "name": "Francisco Arturo Varela Sevilla",
                                "email": "art_6596@yahoo.com",
                                "telefono": "97801540",
                                "nickname": "Art_6596",
                                "_code": "HON-255-EyZ",
                                "created_at": "2018-06-14 03:07:25",
                                "updated_at": "2018-06-14 03:07:25",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 985,
                                "matricula": "10034",
                                "name": "RAMOS CARVAJAL JERSON",
                                "email": "medjer27@hotmail.com",
                                "telefono": "87037144",
                                "nickname": "Dr.Ramos",
                                "_code": "COR-049-yu0",
                                "created_at": "2018-06-14 03:12:42",
                                "updated_at": "2018-07-05 04:12:37",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 986,
                                "matricula": "14503",
                                "name": "TZOC PONCIO JOSE ORLANDO",
                                "email": "orlandotzoc@yahoo.es",
                                "telefono": "52471412/53249136",
                                "nickname": "omagic",
                                "_code": "GUA-155-Sqk",
                                "created_at": "2018-06-14 03:13:09",
                                "updated_at": "2018-06-14 03:13:09",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 987,
                                "matricula": "8",
                                "name": "Ida Ana Elvir Markwitz",
                                "email": "idaelvir@hotmail.com",
                                "telefono": "88521583",
                                "nickname": "Ida",
                                "_code": "NIC-008-Ddq",
                                "created_at": "2018-06-14 03:15:53",
                                "updated_at": "2018-06-14 03:15:53",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 988,
                                "matricula": "13925",
                                "name": "ALEJANDRA VINDAS VARGAS",
                                "email": "alejandrav-@hotmail.com",
                                "telefono": "88978803",
                                "nickname": "Diego",
                                "_code": "COR-014-PJ8",
                                "created_at": "2018-06-14 03:16:15",
                                "updated_at": "2018-06-14 03:16:15",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 989,
                                "matricula": "5808",
                                "name": "HURTARTE BARILLAS SERGIO SIGFREDO",
                                "email": "shurtarte12@gmail.com",
                                "telefono": "54713247",
                                "nickname": "Patchouli",
                                "_code": "Gua-373-59q",
                                "created_at": "2018-06-14 03:16:25",
                                "updated_at": "2018-06-14 03:16:25",
                                "puntos": 56
                            }
                        },
                        {
                            "user": {
                                "id": 990,
                                "matricula": "7861",
                                "name": "ALONZO DIAZ ELDIN OMERO",
                                "email": "eldinalonzo@gmail.com",
                                "telefono": "53235153",
                                "nickname": "El Doc",
                                "_code": "GUA-313-gQC",
                                "created_at": "2018-06-14 03:21:30",
                                "updated_at": "2018-06-14 03:21:30",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 991,
                                "matricula": "17071",
                                "name": "Mariajosé Zambroni",
                                "email": "dramzc@gmail.com",
                                "telefono": "(502) 57158107",
                                "nickname": "MZCdD",
                                "_code": "GUA-138-rhT",
                                "created_at": "2018-06-14 03:22:40",
                                "updated_at": "2018-06-14 03:22:40",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 992,
                                "matricula": "14039",
                                "name": "CASTRO JARQUIN FATIMA LOURDES",
                                "email": "diamary_db@hotmail.com",
                                "telefono": "23549744",
                                "nickname": "jarquin",
                                "_code": "SAL-842-M5M",
                                "created_at": "2018-06-14 03:29:21",
                                "updated_at": "2018-06-14 03:29:21",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 993,
                                "matricula": "14684",
                                "name": "Marta María Reyes González",
                                "email": "mreyes2202@gmail.com",
                                "telefono": "53638327",
                                "nickname": "Tita",
                                "_code": "GUA-229-kHV",
                                "created_at": "2018-06-14 03:29:23",
                                "updated_at": "2018-06-14 03:29:23",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 994,
                                "matricula": "15455",
                                "name": "Giovanni Ernesto González Alvarado",
                                "email": "marciano_giova81@hotmail.com",
                                "telefono": "6168-5814",
                                "nickname": "Dr.marciano",
                                "_code": "SAL-700-Lkr",
                                "created_at": "2018-06-14 03:29:46",
                                "updated_at": "2018-06-14 03:29:46",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 995,
                                "matricula": "11806",
                                "name": "Gerardo David Silva Leiva",
                                "email": "gerardod_77@hotmail.com",
                                "telefono": "+504 9551-8130",
                                "nickname": "Gerardo",
                                "_code": "HON-672-52b",
                                "created_at": "2018-06-14 03:30:29",
                                "updated_at": "2018-06-14 03:30:29",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 996,
                                "matricula": "18895",
                                "name": "PIVARAL SANDOVAL JOSE JOAQUIN",
                                "email": "drjoaquinpivaral@gmail.com",
                                "telefono": "54815330",
                                "nickname": "Jk",
                                "_code": "GUA-173-W2R",
                                "created_at": "2018-06-14 03:32:25",
                                "updated_at": "2018-06-14 03:32:25",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 997,
                                "matricula": "18696",
                                "name": "Juan José Baquiax Yax",
                                "email": "juanjo30691@hotmail.com",
                                "telefono": "48019091",
                                "nickname": "Juanjo30691",
                                "_code": "GUA-093-uHi",
                                "created_at": "2018-06-14 03:34:53",
                                "updated_at": "2018-06-14 03:34:53",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 998,
                                "matricula": "9208",
                                "name": "Jose Alejandro Mendoza Rodriguez",
                                "email": "jlambr1403@gmail.com",
                                "telefono": "95699042",
                                "nickname": "Alejandro",
                                "_code": "HON-050-bha",
                                "created_at": "2018-06-14 03:35:29",
                                "updated_at": "2018-06-14 03:35:29",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 999,
                                "matricula": "13116",
                                "name": "Irene Lilibeth Cardona Guerra",
                                "email": "lili_21nov@hotmail.com",
                                "telefono": "97161132",
                                "nickname": "Irene",
                                "_code": "HON-462-GG0",
                                "created_at": "2018-06-14 03:38:49",
                                "updated_at": "2018-06-14 03:38:49",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 1000,
                                "matricula": "11040",
                                "name": "GUILLEN GONZALEZ DONAL ESAU",
                                "email": "drguillengonzalez@hotmail.com",
                                "telefono": "55107175",
                                "nickname": "Donal Guillén",
                                "_code": "GUA-320-1Oz",
                                "created_at": "2018-06-14 03:41:19",
                                "updated_at": "2018-06-14 03:44:48",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 1001,
                                "matricula": "14769",
                                "name": "NOVA  MONICA",
                                "email": "monicanova1982@yahoo.es",
                                "telefono": "58055132",
                                "nickname": "monicanova",
                                "_code": "GUA-153-sWm",
                                "created_at": "2018-06-14 03:41:42",
                                "updated_at": "2018-06-14 03:41:42",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 1002,
                                "matricula": "7342",
                                "name": "MIRANDA JOSE DALTON",
                                "email": "miranda.dalton@hotmail.com",
                                "telefono": "74502500",
                                "nickname": "dalton",
                                "_code": "SAL-238-VPT",
                                "created_at": "2018-06-14 03:42:31",
                                "updated_at": "2018-06-14 03:42:31",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 1003,
                                "matricula": "10851",
                                "name": "YALIBAT POOU FREDY AMILCAR",
                                "email": "fyalibat@yahoo.com",
                                "telefono": "502+58082770",
                                "nickname": "cobanerocometortillas",
                                "_code": "GUA-975-d64",
                                "created_at": "2018-06-14 03:49:32",
                                "updated_at": "2018-06-30 06:31:15",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 1004,
                                "matricula": "8592",
                                "name": "RIVERA WENDY ISELA",
                                "email": "wendyiselarivera@hotmail.com",
                                "telefono": "98970416",
                                "nickname": "wendyrivers",
                                "_code": "HON-084-Fxc",
                                "created_at": "2018-06-14 03:51:16",
                                "updated_at": "2018-06-14 03:51:16",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 1005,
                                "matricula": "3827",
                                "name": "Fryscia Vaglio Rodriguez",
                                "email": "maricruz.ariasvaglio@gmail.com",
                                "telefono": "88240460",
                                "nickname": "FryVaRo",
                                "_code": "cor-662-v1c",
                                "created_at": "2018-06-14 03:51:16",
                                "updated_at": "2018-06-14 03:51:16",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 1006,
                                "matricula": "16264",
                                "name": "Rubén Dario Godoy Espinoza",
                                "email": "rubn05@gmail.com",
                                "telefono": "30090105",
                                "nickname": "Rubn05",
                                "_code": "GUA-484-vXG",
                                "created_at": "2018-06-14 03:53:35",
                                "updated_at": "2018-06-14 03:53:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1007,
                                "matricula": "9610",
                                "name": "JIMENEZ RAFAEL EDUARDO",
                                "email": "rafajim77@yahoo.com",
                                "telefono": "71403157",
                                "nickname": "Rafa",
                                "_code": "SAL-980-Gvw",
                                "created_at": "2018-06-14 03:56:27",
                                "updated_at": "2018-06-14 03:56:27",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 1008,
                                "matricula": "11470",
                                "name": "DE LEON SANCHEZ DE JUAREZ EDNA NINETH",
                                "email": "en.dels@hotmail.com",
                                "telefono": "42995653",
                                "nickname": "Endels",
                                "_code": "GUA-974-Glt",
                                "created_at": "2018-06-14 03:56:29",
                                "updated_at": "2018-06-14 03:56:29",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 1009,
                                "matricula": "16676",
                                "name": "Erick Gonzalez",
                                "email": "erk_014@hotmail.com",
                                "telefono": "77362511",
                                "nickname": "Erk",
                                "_code": "SAL-796-AED",
                                "created_at": "2018-06-14 03:59:26",
                                "updated_at": "2018-06-14 03:59:26",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1010,
                                "matricula": "10432",
                                "name": "Fallas Villalobos  Patricia",
                                "email": "patriciafallas@consultoriovida.com",
                                "telefono": "83277370",
                                "nickname": "pfallas",
                                "_code": "COR-200-r88",
                                "created_at": "2018-06-14 04:00:43",
                                "updated_at": "2018-07-06 08:02:41",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 1011,
                                "matricula": "7810",
                                "name": "ARGUETA TEJADA JORGE MARIO",
                                "email": "mariorous@yahoo.com.mx",
                                "telefono": "502-40245882",
                                "nickname": "COCORNO",
                                "_code": "GUA-540-CAJ",
                                "created_at": "2018-06-14 04:02:18",
                                "updated_at": "2018-06-14 04:02:18",
                                "puntos": 107
                            }
                        },
                        {
                            "user": {
                                "id": 1012,
                                "matricula": "911251",
                                "name": "Jose Leon Padilla",
                                "email": "jlpadilla67@yahoo.com",
                                "telefono": "97530539",
                                "nickname": "Jose Leon",
                                "_code": "HON-721-tCQ",
                                "created_at": "2018-06-14 04:04:57",
                                "updated_at": "2018-06-30 18:54:16",
                                "puntos": 68
                            }
                        },
                        {
                            "user": {
                                "id": 1013,
                                "matricula": "12084",
                                "name": "RIVAS CONTRERAS JOSE ROLANDO",
                                "email": "jrolandorc30@gmail.com",
                                "telefono": "57824651",
                                "nickname": "Rolando",
                                "_code": "GUA-714-vs2",
                                "created_at": "2018-06-14 04:18:05",
                                "updated_at": "2018-06-14 04:18:05",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 1014,
                                "matricula": "12469",
                                "name": "TINOCO CARLOS",
                                "email": "carlostinoco72@wazzub.com",
                                "telefono": "88117238",
                                "nickname": "neuro100",
                                "_code": "NIC-039-osz",
                                "created_at": "2018-06-14 04:19:16",
                                "updated_at": "2018-06-14 04:19:16",
                                "puntos": 98
                            }
                        },
                        {
                            "user": {
                                "id": 1015,
                                "matricula": "11294",
                                "name": "SOTO  IBAÑEZ  ISELA  ARLENE",
                                "email": "nfabriciosoto@gmail.com",
                                "telefono": "56945349",
                                "nickname": "arlene",
                                "_code": "GUA-426-LmJ",
                                "created_at": "2018-06-14 04:20:18",
                                "updated_at": "2018-06-14 04:20:18",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 1016,
                                "matricula": "20380",
                                "name": "Griselda Yanira Ruano Bautista",
                                "email": "griseldaruano@gmail.com",
                                "telefono": "56962915 / 32580544 / 79242273",
                                "nickname": "Grisitaruano",
                                "_code": "GUA-012-VIW",
                                "created_at": "2018-06-14 04:20:30",
                                "updated_at": "2018-06-14 04:20:30",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 1017,
                                "matricula": "13310",
                                "name": "RAMIREZ SIERRA JORGE FEDERICO",
                                "email": "pediatrajramirez@yahoo.com",
                                "telefono": "41493888",
                                "nickname": "Jorge",
                                "_code": "GUA-301-CWR",
                                "created_at": "2018-06-14 04:21:57",
                                "updated_at": "2018-06-14 04:21:57",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 1018,
                                "matricula": "2059",
                                "name": "Karla Paredes",
                                "email": "kafapaba@hotmail.com",
                                "telefono": "30152143",
                                "nickname": "kafapaba@hotmail.com",
                                "_code": "GUA-783-qAu",
                                "created_at": "2018-06-14 04:25:12",
                                "updated_at": "2018-06-14 06:45:02",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 1019,
                                "matricula": "4471",
                                "name": "CHAVES CASTRO NURIA",
                                "email": "mgc27@costarricense.cr",
                                "telefono": "83943675",
                                "nickname": "Nuria",
                                "_code": "COR-918-0La",
                                "created_at": "2018-06-14 04:29:27",
                                "updated_at": "2018-06-30 07:19:42",
                                "puntos": 75
                            }
                        },
                        {
                            "user": {
                                "id": 1020,
                                "matricula": "5216",
                                "name": "ZALDIVAR LIZVETH GLENDA",
                                "email": "glenzal70@yahoo.es",
                                "telefono": "96166575",
                                "nickname": "Glenda",
                                "_code": "HON-391-ms1",
                                "created_at": "2018-06-14 04:40:57",
                                "updated_at": "2018-06-14 04:40:57",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 1021,
                                "matricula": "5784",
                                "name": "Mabel de carrera",
                                "email": "mabsuca@gmail.com",
                                "telefono": "58435072",
                                "nickname": "mabsuca@gmail.com",
                                "_code": "GUA-462-eHF",
                                "created_at": "2018-06-14 04:41:29",
                                "updated_at": "2018-06-14 04:41:29",
                                "puntos": 67
                            }
                        },
                        {
                            "user": {
                                "id": 1022,
                                "matricula": "15842",
                                "name": "MORA CROVELLA AMANDA",
                                "email": "walfredec@gmail.com",
                                "telefono": "56302898",
                                "nickname": "Mandy",
                                "_code": "GUA-875-WAI",
                                "created_at": "2018-06-14 04:41:54",
                                "updated_at": "2018-06-14 04:41:54",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 1023,
                                "matricula": "11919",
                                "name": "VASQUEZ ORTIZ JAIRO JOSUE",
                                "email": "jv_imperius69@hotmail.com",
                                "telefono": "97500103",
                                "nickname": "JairoVasquez",
                                "_code": "HON-339-Px7",
                                "created_at": "2018-06-14 04:45:01",
                                "updated_at": "2018-06-14 04:45:01",
                                "puntos": 91
                            }
                        },
                        {
                            "user": {
                                "id": 1024,
                                "matricula": "10374",
                                "name": "VASQUEZ GARCIA DE HIPP MILDRED ESMERALDA",
                                "email": "milvashipp@gmail.com",
                                "telefono": "59255953049",
                                "nickname": "Mildred",
                                "_code": "GUA-495-w0r",
                                "created_at": "2018-06-14 04:47:12",
                                "updated_at": "2018-07-05 06:20:05",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 1025,
                                "matricula": "11251",
                                "name": "LOPEZ CARRILLO CARLOS FRANCISCO",
                                "email": "drjerryni@yahoo.es",
                                "telefono": "88379145",
                                "nickname": "drjerryni@yahoo.es",
                                "_code": "NIC-080-HGI",
                                "created_at": "2018-06-14 04:49:28",
                                "updated_at": "2018-06-14 04:49:28",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 1026,
                                "matricula": "4449",
                                "name": "Alexis Javier Reyes",
                                "email": "ajra1965@yahoo.com",
                                "telefono": "96010140",
                                "nickname": "Alexis",
                                "_code": "HON-842-Nvj",
                                "created_at": "2018-06-14 04:56:03",
                                "updated_at": "2018-06-14 04:56:03",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 1027,
                                "matricula": "5324",
                                "name": "GOMEZ LOPEZ PABLO ROLANDO",
                                "email": "pablorolando1956@gmail.com",
                                "telefono": "57616510",
                                "nickname": "pablo rolando",
                                "_code": "GUA-010-XzM",
                                "created_at": "2018-06-14 04:58:19",
                                "updated_at": "2018-06-14 04:58:19",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 1028,
                                "matricula": "18286",
                                "name": "Julio César Minera",
                                "email": "juliocesarminera@icloud.com",
                                "telefono": "53062280",
                                "nickname": "Julio_minera",
                                "_code": "GUA-669-vgO",
                                "created_at": "2018-06-14 05:00:21",
                                "updated_at": "2018-06-14 05:00:21",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 1029,
                                "matricula": "6381",
                                "name": "ILLESCAS CHINCHILLA HUGO LEONEL",
                                "email": "doctoresgenerales@gmail.com",
                                "telefono": "59756704",
                                "nickname": "HugoDoc",
                                "_code": "GUA-203-loO",
                                "created_at": "2018-06-14 05:07:33",
                                "updated_at": "2018-06-14 05:46:32",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 1030,
                                "matricula": "16694",
                                "name": "QUIROZ GODINEZ SHERLY LUZ KARINA",
                                "email": "sherlynquiroz@gmail.com",
                                "telefono": "55757256",
                                "nickname": "lucecita",
                                "_code": "GUA-856-YKI",
                                "created_at": "2018-06-14 05:12:18",
                                "updated_at": "2018-06-14 05:12:18",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 1031,
                                "matricula": "7723",
                                "name": "MENDOZA MUÑOZ BESSY CAROLINA",
                                "email": "bessytoyico@hotmail.com",
                                "telefono": "99072506",
                                "nickname": "Bessy",
                                "_code": "HON-841-n99",
                                "created_at": "2018-06-14 05:13:30",
                                "updated_at": "2018-06-14 05:13:30",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 1032,
                                "matricula": "205005709",
                                "name": "HUGO DANIEL SANABRIA",
                                "email": "hsanabriav@yahoo.com",
                                "telefono": "99865773",
                                "nickname": "HUGOL",
                                "_code": "HON-893-VcY",
                                "created_at": "2018-06-14 05:15:37",
                                "updated_at": "2018-06-14 05:15:37",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 1033,
                                "matricula": "13622",
                                "name": "MAZARIEGOS CIFUENTES ISABEL CRISTINA",
                                "email": "isabelmazariegosc@yahoo.com",
                                "telefono": "57492350",
                                "nickname": "Diabetes",
                                "_code": "GUA-604-KLU",
                                "created_at": "2018-06-14 05:16:29",
                                "updated_at": "2018-07-05 18:41:17",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 1034,
                                "matricula": "16941",
                                "name": "Herberth Hernandez",
                                "email": "h7_blue@hotmail.com",
                                "telefono": "61393992",
                                "nickname": "PoshoHdez",
                                "_code": "SAL-097-kYL",
                                "created_at": "2018-06-14 05:17:25",
                                "updated_at": "2018-06-14 05:17:25",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 1035,
                                "matricula": "7097",
                                "name": "SEQUEIRA CARLOS ANTONIO",
                                "email": "doncaselo@hotmail.com",
                                "telefono": "505-88458519",
                                "nickname": "CARLOS",
                                "_code": "NIC-884-mwz",
                                "created_at": "2018-06-14 05:19:16",
                                "updated_at": "2018-06-14 05:19:16",
                                "puntos": 87
                            }
                        },
                        {
                            "user": {
                                "id": 1036,
                                "matricula": "8651",
                                "name": "Otto Aguilar",
                                "email": "ottoaguilar_73@hotmail.com",
                                "telefono": "5014",
                                "nickname": "ottoaguilar_73@Hotmail.com",
                                "_code": "GUA-079-JLv",
                                "created_at": "2018-06-14 05:19:27",
                                "updated_at": "2018-06-14 05:19:27",
                                "puntos": 56
                            }
                        },
                        {
                            "user": {
                                "id": 1037,
                                "matricula": "13193",
                                "name": "JORGE ANDRES HERRERA CORRALES",
                                "email": "drsherrera@hotmail.com",
                                "telefono": "8878955",
                                "nickname": "Jorge H",
                                "_code": "COR-255-oX5",
                                "created_at": "2018-06-14 05:20:18",
                                "updated_at": "2018-06-14 05:20:18",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 1038,
                                "matricula": "3149",
                                "name": "Juanita Sanjuan",
                                "email": "juanitasg63@hotmail.com",
                                "telefono": "83828957",
                                "nickname": "Juani",
                                "_code": "COR-656-6PP",
                                "created_at": "2018-06-14 05:20:21",
                                "updated_at": "2018-06-14 05:20:21",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 1039,
                                "matricula": "5223",
                                "name": "Erwin Hernandez",
                                "email": "meboyalan@gmail.com",
                                "telefono": "52011334",
                                "nickname": "boyalan",
                                "_code": "gua-164-rxh",
                                "created_at": "2018-06-14 05:20:34",
                                "updated_at": "2018-06-14 05:20:34",
                                "puntos": 96
                            }
                        },
                        {
                            "user": {
                                "id": 1040,
                                "matricula": "939",
                                "name": "CLAUDIA MARTINEZ",
                                "email": "cmartinezgabuardi@gmail.com",
                                "telefono": "88028606",
                                "nickname": "Claudia I Martinez",
                                "_code": "NIC-939-MIM",
                                "created_at": "2018-06-14 05:23:06",
                                "updated_at": "2018-06-14 05:23:06",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 1041,
                                "matricula": "1330",
                                "name": "Cid Veronica Castro Benitez",
                                "email": "cidcastro12@gmail.com",
                                "telefono": "41643353",
                                "nickname": "Cid Castro",
                                "_code": "GUA-015-wvd",
                                "created_at": "2018-06-14 05:23:10",
                                "updated_at": "2018-06-14 05:23:10",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 1042,
                                "matricula": "9773",
                                "name": "Rony Armando Martínez Castro",
                                "email": "ronymartinez42@yahoo.es",
                                "telefono": "5205-9021",
                                "nickname": "Traumamati",
                                "_code": "GUA-468-YpP",
                                "created_at": "2018-06-14 05:23:27",
                                "updated_at": "2018-06-14 05:23:27",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1043,
                                "matricula": "23810",
                                "name": "LOPEZ MENDOZA TAMARA ELIZABETH",
                                "email": "dra.tamaralopez82@gmail.com",
                                "telefono": "86264076",
                                "nickname": "Kitty",
                                "_code": "NIC-466-MQN",
                                "created_at": "2018-06-14 05:24:28",
                                "updated_at": "2018-06-14 05:24:28",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 1044,
                                "matricula": "9075",
                                "name": "OROZCO PILOÑA MARIO ROBERTO",
                                "email": "dr_orozcopilona@hotmail.com",
                                "telefono": "57151989",
                                "nickname": "Mario Roberto",
                                "_code": "GUA-093-uzu",
                                "created_at": "2018-06-14 05:25:10",
                                "updated_at": "2018-06-14 05:25:10",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 1045,
                                "matricula": "16836",
                                "name": "CUELLAR VELAZQUEZ ASTRID",
                                "email": "astridcuellar28@gmail.com",
                                "telefono": "53067291",
                                "nickname": "Astrid",
                                "_code": "GUA-818-3tG",
                                "created_at": "2018-06-14 05:25:41",
                                "updated_at": "2018-06-14 05:25:41",
                                "puntos": 109
                            }
                        },
                        {
                            "user": {
                                "id": 1046,
                                "matricula": "14026",
                                "name": "Astrid Cambronero Fernández",
                                "email": "astridm_08@hotmail.com",
                                "telefono": "87140317",
                                "nickname": "astridm_08",
                                "_code": "COR-763-JZH",
                                "created_at": "2018-06-14 05:26:39",
                                "updated_at": "2018-06-14 05:26:39",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1047,
                                "matricula": "8092",
                                "name": "RIVERA BENJAMIN",
                                "email": "benjarivera@hotmail.com",
                                "telefono": "99072506",
                                "nickname": "Benji",
                                "_code": "HON-355-1yf",
                                "created_at": "2018-06-14 05:31:40",
                                "updated_at": "2018-06-14 05:31:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1048,
                                "matricula": "110993",
                                "name": "José Daniel Meza Padilla",
                                "email": "mezadaniel42@gmail.com",
                                "telefono": "96252476",
                                "nickname": "Mezadaniel42",
                                "_code": "HON-083-dVB",
                                "created_at": "2018-06-14 05:31:55",
                                "updated_at": "2018-06-14 05:31:55",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1049,
                                "matricula": "11334",
                                "name": "VASQUEZ VALENZUELA KIRK EMERSON",
                                "email": "kirkpediatria@gmail.com",
                                "telefono": "58051070",
                                "nickname": "Emerk",
                                "_code": "GUA-434-3YT",
                                "created_at": "2018-06-14 05:33:48",
                                "updated_at": "2018-06-14 05:33:48",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 1050,
                                "matricula": "9303",
                                "name": "TOLEDO ORELLANA MARIO ROBERTO",
                                "email": "drmariotoledo@yahoo.com",
                                "telefono": "49479918",
                                "nickname": "Mario",
                                "_code": "GUA-938-2ne",
                                "created_at": "2018-06-14 05:35:51",
                                "updated_at": "2018-06-14 05:35:51",
                                "puntos": 30
                            }
                        },
                        {
                            "user": {
                                "id": 1051,
                                "matricula": "6546",
                                "name": "JUAREZ JOEL FABIAN",
                                "email": "jofaju25@hotmail.com",
                                "telefono": "5875 7170",
                                "nickname": "Well",
                                "_code": "GUA-144-Agi",
                                "created_at": "2018-06-14 05:38:12",
                                "updated_at": "2018-06-14 05:38:12",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 1052,
                                "matricula": "14663",
                                "name": "Luis Felipe Víquez Arias",
                                "email": "felipev19a@gmail.com",
                                "telefono": "86429611",
                                "nickname": "Felipe19",
                                "_code": "COR-017-ATh",
                                "created_at": "2018-06-14 05:39:36",
                                "updated_at": "2018-06-14 05:39:36",
                                "puntos": 58
                            }
                        },
                        {
                            "user": {
                                "id": 1053,
                                "matricula": "6607",
                                "name": "Blanca Carolina Dominguez Castellanos",
                                "email": "cardomcas@hotmail.com",
                                "telefono": "7872-3368",
                                "nickname": "cardomcas",
                                "_code": "GUA-359-2Az",
                                "created_at": "2018-06-14 05:40:22",
                                "updated_at": "2018-06-14 05:40:22",
                                "puntos": 59
                            }
                        },
                        {
                            "user": {
                                "id": 1054,
                                "matricula": "8357",
                                "name": "CARRERA LEIVA ALMA LISSETE",
                                "email": "dradeajtun@gmail.com",
                                "telefono": "54191586",
                                "nickname": "ALMA",
                                "_code": "GUA-656-ir2",
                                "created_at": "2018-06-14 05:41:05",
                                "updated_at": "2018-06-14 05:41:05",
                                "puntos": 105
                            }
                        },
                        {
                            "user": {
                                "id": 1055,
                                "matricula": "12200",
                                "name": "FRANCISCO NICOLAS SIMON",
                                "email": "sychico@hotmail.com",
                                "telefono": "502 55276876",
                                "nickname": "simonfn",
                                "_code": "GUA-078-BIU",
                                "created_at": "2018-06-14 05:45:02",
                                "updated_at": "2018-06-14 05:45:02",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 1056,
                                "matricula": "11944",
                                "name": "PINEDA RONY",
                                "email": "ronypineda72@gmail.com",
                                "telefono": "54752233 / 57898513",
                                "nickname": "Rony Pineda",
                                "_code": "GUA-195-wKN",
                                "created_at": "2018-06-14 05:49:46",
                                "updated_at": "2018-06-14 05:49:46",
                                "puntos": 53
                            }
                        },
                        {
                            "user": {
                                "id": 1057,
                                "matricula": "6829",
                                "name": "VALDEZ ZEA ADRIAN ALFONSO",
                                "email": "dr.adrianvaldez@gmail.com",
                                "telefono": "52041302",
                                "nickname": "ADRIAN SR.",
                                "_code": "GUA-123-UId",
                                "created_at": "2018-06-14 05:51:35",
                                "updated_at": "2018-06-14 05:51:35",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 1058,
                                "matricula": "11952",
                                "name": "AREVALO ORTIZ VICTOR HUGO",
                                "email": "drvictorarevalo@gmail.com",
                                "telefono": "53221113",
                                "nickname": "VHO",
                                "_code": "GUA-187-W7k",
                                "created_at": "2018-06-14 05:53:12",
                                "updated_at": "2018-06-14 05:53:12",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 1059,
                                "matricula": "6249",
                                "name": "Luis fernando  sanchez",
                                "email": "lufersan10@yahoo.es",
                                "telefono": "99855157",
                                "nickname": "Lufersan",
                                "_code": "Hon-013-3up",
                                "created_at": "2018-06-14 05:55:35",
                                "updated_at": "2018-06-14 05:58:50",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 1060,
                                "matricula": "10187",
                                "name": "Leonardo Silva",
                                "email": "drsilvareyes@yahoo.com",
                                "telefono": "83112050",
                                "nickname": "drsilva",
                                "_code": "COR-699-JRq",
                                "created_at": "2018-06-14 05:55:41",
                                "updated_at": "2018-06-14 05:55:41",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 1061,
                                "matricula": "11485",
                                "name": "Jan Paul II Diermissen Picado",
                                "email": "doctorjpdiermissen@gmail.com",
                                "telefono": "8828-4213",
                                "nickname": "JAN",
                                "_code": "COR-099-3sz",
                                "created_at": "2018-06-14 05:55:43",
                                "updated_at": "2018-06-14 05:55:43",
                                "puntos": 90
                            }
                        },
                        {
                            "user": {
                                "id": 1062,
                                "matricula": "10908",
                                "name": "JUAREZ OCHOA GLICERIO FRANCISCO",
                                "email": "cheyojose@hotmail.com",
                                "telefono": "54199853",
                                "nickname": "Cheyo",
                                "_code": "GUA-052-InS",
                                "created_at": "2018-06-14 05:58:52",
                                "updated_at": "2018-06-14 05:58:52",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 1063,
                                "matricula": "15652",
                                "name": "LARA MARIA JOSE",
                                "email": "majola_3@hotmail.com",
                                "telefono": "30111645",
                                "nickname": "Majola_3",
                                "_code": "GUA-765-xDN",
                                "created_at": "2018-06-14 06:06:55",
                                "updated_at": "2018-07-10 06:24:54",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 1064,
                                "matricula": "58722",
                                "name": "Luz Evelia Calero Godinez",
                                "email": "luzwas15@gmail.com",
                                "telefono": "+50575217991",
                                "nickname": "luzev",
                                "_code": "NIC-246-0mx",
                                "created_at": "2018-06-14 06:08:04",
                                "updated_at": "2018-06-14 06:08:04",
                                "puntos": 14
                            }
                        },
                        {
                            "user": {
                                "id": 1065,
                                "matricula": "8960",
                                "name": "HERNANDEZ DOMINGUEZ DENYS EDUARDO",
                                "email": "dennis.hernandez@pantaleon.com",
                                "telefono": "33836997",
                                "nickname": "Dns",
                                "_code": "Hon-099-ca4",
                                "created_at": "2018-06-14 06:08:30",
                                "updated_at": "2018-06-14 06:08:30",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 1066,
                                "matricula": "10479",
                                "name": "Benet Yamil Espinoza",
                                "email": "byle87@hotmail.com",
                                "telefono": "97870542",
                                "nickname": "yamil",
                                "_code": "HON-536-AVE",
                                "created_at": "2018-06-14 06:08:54",
                                "updated_at": "2018-06-26 16:26:56",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 1067,
                                "matricula": "4458",
                                "name": "CALDERON MARTINEZ EDEN EDWARD",
                                "email": "edencalderonm@gmail.com",
                                "telefono": "59230909",
                                "nickname": "docedenc",
                                "_code": "GUA-060-gAV",
                                "created_at": "2018-06-14 06:08:59",
                                "updated_at": "2018-06-14 06:08:59",
                                "puntos": 104
                            }
                        },
                        {
                            "user": {
                                "id": 1068,
                                "matricula": "16545",
                                "name": "German",
                                "email": "reyesgerman25@hotmail.com",
                                "telefono": "74590944",
                                "nickname": "Reyes",
                                "_code": "SAL-579-LXh",
                                "created_at": "2018-06-14 06:09:09",
                                "updated_at": "2018-06-14 06:09:09",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 1069,
                                "matricula": "15184",
                                "name": "Kelly Ramirez Murillo",
                                "email": "kellyramirezm@gmail.com",
                                "telefono": "88840305",
                                "nickname": "kellyrm92",
                                "_code": "COR-428-YZF",
                                "created_at": "2018-06-14 06:10:15",
                                "updated_at": "2018-06-14 06:10:15",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 1070,
                                "matricula": "1616",
                                "name": "CASTILLO PINZON MARIO EDMUNDO",
                                "email": "pinzoncastillo16@gmail.com",
                                "telefono": "503 71138293",
                                "nickname": "mario",
                                "_code": "SAL-126-vpU",
                                "created_at": "2018-06-14 06:13:00",
                                "updated_at": "2018-06-14 06:13:00",
                                "puntos": 80
                            }
                        },
                        {
                            "user": {
                                "id": 1071,
                                "matricula": "5828",
                                "name": "Douglas Israel Zuniga",
                                "email": "diduzuniga@gmail.com",
                                "telefono": "32593122",
                                "nickname": "didu",
                                "_code": "HON-146-SEW",
                                "created_at": "2018-06-14 06:14:56",
                                "updated_at": "2018-06-14 06:14:56",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 1072,
                                "matricula": "10908",
                                "name": "JUAREZ OCHOA GLICERIO FRANCISCO",
                                "email": "cheyojose71@gmail.com",
                                "telefono": "54199853",
                                "nickname": "Cheyo",
                                "_code": "GUA-743-oQ2",
                                "created_at": "2018-06-14 06:17:56",
                                "updated_at": "2018-06-14 06:17:56",
                                "puntos": 112
                            }
                        },
                        {
                            "user": {
                                "id": 1073,
                                "matricula": "12733",
                                "name": "Era",
                                "email": "drefrainmoreno@gmail.com",
                                "telefono": "4220661",
                                "nickname": "Moreno",
                                "_code": "GUA-565-2Bz",
                                "created_at": "2018-06-14 06:18:06",
                                "updated_at": "2018-06-14 06:18:06",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 1074,
                                "matricula": "11481",
                                "name": "GRAMAJO  ARGUETA  BYRON  MANFREDO",
                                "email": "byrongramajo@hotmail.com",
                                "telefono": "55283595",
                                "nickname": "Dr. Gramajo",
                                "_code": "GUA-200-z6G",
                                "created_at": "2018-06-14 06:21:41",
                                "updated_at": "2018-06-14 06:21:41",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 1075,
                                "matricula": "7450",
                                "name": "RAMÍREZ PEREZ, JULIO ROLANDO",
                                "email": "drrolandoramirez@gmail.com",
                                "telefono": "42096393",
                                "nickname": "Rolando Ramírez",
                                "_code": "GUA-779-Ilc",
                                "created_at": "2018-06-14 06:22:37",
                                "updated_at": "2018-06-14 06:22:37",
                                "puntos": 94
                            }
                        },
                        {
                            "user": {
                                "id": 1076,
                                "matricula": "621",
                                "name": "JOEL MOISES FIGUEROA LUNA",
                                "email": "mfigueroa0808@yahoo.com.ar",
                                "telefono": "503 71804566",
                                "nickname": "JOEL",
                                "_code": "SAL-621-DTA",
                                "created_at": "2018-06-14 06:23:00",
                                "updated_at": "2018-06-14 06:23:00",
                                "puntos": 74
                            }
                        },
                        {
                            "user": {
                                "id": 1077,
                                "matricula": "12439",
                                "name": "ISCHIU MAZARIEGOS JOSE MANUEL",
                                "email": "joseischiu.123.456@gmail.com",
                                "telefono": "59391398",
                                "nickname": "Dr.JoséManuel",
                                "_code": "GUA-179-9JP",
                                "created_at": "2018-06-14 06:24:19",
                                "updated_at": "2018-06-14 06:24:19",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 1078,
                                "matricula": "16901",
                                "name": "CLAUDIA LILY ZEPEDA SANDOVAL",
                                "email": "zepedasandoval@gmail.com",
                                "telefono": "42194609",
                                "nickname": "DRAZEPEDA",
                                "_code": "GUA-383-HdR",
                                "created_at": "2018-06-14 06:25:04",
                                "updated_at": "2018-06-14 06:25:04",
                                "puntos": 85
                            }
                        },
                        {
                            "user": {
                                "id": 1079,
                                "matricula": "8092",
                                "name": "RIVERA BENJAMIN",
                                "email": "benjamin.r.montealegre@gmail.com",
                                "telefono": "99072506",
                                "nickname": "Benji",
                                "_code": "HON-575-W7v",
                                "created_at": "2018-06-14 06:25:48",
                                "updated_at": "2018-06-14 06:25:48",
                                "puntos": 99
                            }
                        },
                        {
                            "user": {
                                "id": 1080,
                                "matricula": "16847",
                                "name": "ALVARADO ROMERO BLANCA XIOMARA",
                                "email": "brax00@hotmail.com",
                                "telefono": "52778880",
                                "nickname": "Blanqui",
                                "_code": "GUA-540-5b7",
                                "created_at": "2018-06-14 06:26:37",
                                "updated_at": "2018-06-14 06:26:37",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 1081,
                                "matricula": "8338",
                                "name": "Ricardo Alejandro Matute Ynestroza",
                                "email": "rickman8408@gmail.com",
                                "telefono": "97990407",
                                "nickname": "Ricardo Matute",
                                "_code": "HON-705-dA2",
                                "created_at": "2018-06-14 06:26:44",
                                "updated_at": "2018-06-14 06:26:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1082,
                                "matricula": "16205",
                                "name": "Antonio Jose Gomez Recinos",
                                "email": "anjogore@hotmail.com",
                                "telefono": "76824554",
                                "nickname": "Tonito6988",
                                "_code": "SAL-600-aDt",
                                "created_at": "2018-06-14 06:27:19",
                                "updated_at": "2018-06-14 06:27:19",
                                "puntos": 63
                            }
                        },
                        {
                            "user": {
                                "id": 1083,
                                "matricula": "16002",
                                "name": "LOPEZ URIZAR CARLOS MOISES",
                                "email": "carlosurizar10@hotmail.com",
                                "telefono": "50230412414",
                                "nickname": "Carlitros10",
                                "_code": "GUA-510-sl3",
                                "created_at": "2018-06-14 06:28:04",
                                "updated_at": "2018-06-14 06:28:04",
                                "puntos": 68
                            }
                        },
                        {
                            "user": {
                                "id": 1084,
                                "matricula": "10197",
                                "name": "RUIZ CABARRUS MARIE SARA ROXXANE",
                                "email": "mroxanna@ufm.edu",
                                "telefono": "52082482",
                                "nickname": "draRoxanna",
                                "_code": "GUA-619-NNR",
                                "created_at": "2018-06-14 06:32:16",
                                "updated_at": "2018-06-14 06:32:16",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 1085,
                                "matricula": "21509208",
                                "name": "Reyes Lazo Berny Dayan",
                                "email": "drabernyreyes17@yahoo.com",
                                "telefono": "99082102",
                                "nickname": "Dra. Berny",
                                "_code": "HON-794-vTT",
                                "created_at": "2018-06-14 06:37:03",
                                "updated_at": "2018-06-14 06:37:03",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 1086,
                                "matricula": "39011",
                                "name": "Silvia Marlene Andrade Medina",
                                "email": "silviacardoza85@gmail.com",
                                "telefono": "83915002",
                                "nickname": "Doctora Andrade",
                                "_code": "NIC-918-n88",
                                "created_at": "2018-06-14 06:43:32",
                                "updated_at": "2018-06-14 06:43:32",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 1087,
                                "matricula": "6198",
                                "name": "AQUINO MATAMOROS HECTOR MAURICIO",
                                "email": "psqmauriaquisi@hotmail.com",
                                "telefono": "55161302",
                                "nickname": "Mauaquino",
                                "_code": "GUA-607-1y3",
                                "created_at": "2018-06-14 06:43:44",
                                "updated_at": "2018-06-14 06:43:44",
                                "puntos": 56
                            }
                        },
                        {
                            "user": {
                                "id": 1088,
                                "matricula": "12659",
                                "name": "TRIMINIO MARTINEZ RAFAEL LEONARDO",
                                "email": "cloudrafa@yahoo.com",
                                "telefono": "98479149",
                                "nickname": "Leo82",
                                "_code": "HON-274-uit",
                                "created_at": "2018-06-14 06:45:12",
                                "updated_at": "2018-06-14 06:45:12",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 1089,
                                "matricula": "10682",
                                "name": "TELLO CIFUENTES NORMAN FERNANDO",
                                "email": "norman.tello@gmail.com",
                                "telefono": "5203-0221",
                                "nickname": "Norman Tello",
                                "_code": "GUA-889-ghm",
                                "created_at": "2018-06-14 06:45:48",
                                "updated_at": "2018-06-14 06:45:48",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1090,
                                "matricula": "16616",
                                "name": "Luis Alonso Lopez Palacios",
                                "email": "luislp0202@gmail.com",
                                "telefono": "78035040",
                                "nickname": "LuisA",
                                "_code": "SAL-710-7Wm",
                                "created_at": "2018-06-14 06:46:02",
                                "updated_at": "2018-06-14 06:46:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1091,
                                "matricula": "11718",
                                "name": "Isis Sorto",
                                "email": "ifab_1610@hotmail.com",
                                "telefono": "98086267",
                                "nickname": "Titi",
                                "_code": "HON-881-o36",
                                "created_at": "2018-06-14 06:49:34",
                                "updated_at": "2018-06-14 06:49:34",
                                "puntos": 40
                            }
                        },
                        {
                            "user": {
                                "id": 1092,
                                "matricula": "10269",
                                "name": "CUBILLO MOYA MARTIN FEDERICO",
                                "email": "fcubillo1904@gmail.com",
                                "telefono": "32892023",
                                "nickname": "Fede",
                                "_code": "HON-067-8Eq",
                                "created_at": "2018-06-14 06:49:51",
                                "updated_at": "2018-06-14 06:49:51",
                                "puntos": 72
                            }
                        },
                        {
                            "user": {
                                "id": 1093,
                                "matricula": "11362",
                                "name": "Ingreed Liceth Dueñas",
                                "email": "ingreed_duenas@hotmail.com",
                                "telefono": "71296246",
                                "nickname": "Ingreed",
                                "_code": "SAL-723-EWe",
                                "created_at": "2018-06-14 06:52:49",
                                "updated_at": "2018-06-14 06:52:49",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1094,
                                "matricula": "16673",
                                "name": "Dimas Salvador Zelaya Torres",
                                "email": "armiditajr@gmail.com",
                                "telefono": "78502816",
                                "nickname": "Armiditajr",
                                "_code": "SAL-725-d9p",
                                "created_at": "2018-06-14 06:55:04",
                                "updated_at": "2018-06-14 06:55:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1095,
                                "matricula": "5087",
                                "name": "Edgardo Antonio Espinal Lagos",
                                "email": "dr_espinal_2006@hotmail.com",
                                "telefono": "99755770",
                                "nickname": "Edgar",
                                "_code": "HON-967-up1",
                                "created_at": "2018-06-14 06:57:14",
                                "updated_at": "2018-06-14 06:57:14",
                                "puntos": 89
                            }
                        },
                        {
                            "user": {
                                "id": 1096,
                                "matricula": "17888",
                                "name": "GARCIA LOPEZ GABRIELA YANNETH",
                                "email": "gabgarl@hotmail.com",
                                "telefono": "43919510",
                                "nickname": "GabyGarlo",
                                "_code": "GUA-909-Ugk",
                                "created_at": "2018-06-14 06:59:20",
                                "updated_at": "2018-06-14 06:59:20",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 1097,
                                "matricula": "7824",
                                "name": "ZAMORA REYES LUIS ERNESTO",
                                "email": "docluiszamora@gmail.com",
                                "telefono": "55023021",
                                "nickname": "ChinoZamora",
                                "_code": "GUA-400-3CY",
                                "created_at": "2018-06-14 06:59:48",
                                "updated_at": "2018-06-14 06:59:48",
                                "puntos": 118
                            }
                        },
                        {
                            "user": {
                                "id": 1098,
                                "matricula": "6274",
                                "name": "Jose Ernesto Murillo Luque",
                                "email": "muriluque0703@hotmail.com",
                                "telefono": "99243050",
                                "nickname": "muriluque",
                                "_code": "HON-259-dcD",
                                "created_at": "2018-06-14 07:00:50",
                                "updated_at": "2018-06-14 07:00:50",
                                "puntos": 101
                            }
                        },
                        {
                            "user": {
                                "id": 1099,
                                "matricula": "14362",
                                "name": "GONZALEZ ARTEAGA JEFFRY MANUEL",
                                "email": "jeffreymedic@hotmail.com",
                                "telefono": "58745232",
                                "nickname": "Jeff",
                                "_code": "GUA-843-XqA",
                                "created_at": "2018-06-14 07:00:59",
                                "updated_at": "2018-06-14 07:00:59",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 1100,
                                "matricula": "15699",
                                "name": "JUAREZ MARROQUIN BLANCA NOHEMI",
                                "email": "blancajuarezmn@gmail.com",
                                "telefono": "30356992",
                                "nickname": "Nohe",
                                "_code": "GUA-012-Azc",
                                "created_at": "2018-06-14 07:01:03",
                                "updated_at": "2018-06-14 07:01:03",
                                "puntos": 70
                            }
                        },
                        {
                            "user": {
                                "id": 1101,
                                "matricula": "16684",
                                "name": "José Carlos Paez Rivas",
                                "email": "josepr907@hotmail.com",
                                "telefono": "40086811",
                                "nickname": "José Carlos",
                                "_code": "GUA-589-nL1",
                                "created_at": "2018-06-14 07:01:09",
                                "updated_at": "2018-06-14 07:01:09",
                                "puntos": 92
                            }
                        },
                        {
                            "user": {
                                "id": 1102,
                                "matricula": "1018",
                                "name": "ALVARADO LIMA FRANCISCO",
                                "email": "gleonzo@hotmail.com",
                                "telefono": "55629334",
                                "nickname": "lima",
                                "_code": "GUA-482-eqh",
                                "created_at": "2018-06-14 07:02:13",
                                "updated_at": "2018-06-14 07:02:13",
                                "puntos": 93
                            }
                        },
                        {
                            "user": {
                                "id": 1103,
                                "matricula": "11203",
                                "name": "FUNES NUÑEZ LORENA SEBASTIANA",
                                "email": "kaf16@hotmail.es",
                                "telefono": "77461704",
                                "nickname": "Azulita",
                                "_code": "SAL-496-NEI",
                                "created_at": "2018-06-14 07:04:26",
                                "updated_at": "2018-06-14 07:12:07",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1104,
                                "matricula": "5298",
                                "name": "IDIAQUEZ BARADAT DIEGO",
                                "email": "d-idiaquezb@hotmail.com",
                                "telefono": "99527347",
                                "nickname": "El Paps",
                                "_code": "HON-291-gyN",
                                "created_at": "2018-06-14 07:06:23",
                                "updated_at": "2018-06-14 07:06:23",
                                "puntos": 117
                            }
                        },
                        {
                            "user": {
                                "id": 1105,
                                "matricula": "13509",
                                "name": "Jorge Raul",
                                "email": "jorgeruizmend81@hotmail.com",
                                "telefono": "98851353",
                                "nickname": "Ruiz",
                                "_code": "HON-795-ed4",
                                "created_at": "2018-06-14 07:11:46",
                                "updated_at": "2018-06-14 07:11:46",
                                "puntos": 86
                            }
                        },
                        {
                            "user": {
                                "id": 1106,
                                "matricula": "6759",
                                "name": "TRUJILLO ALDANA LUIS FRANCISCO",
                                "email": "drluistrujillo@yahoo.com",
                                "telefono": "59461329",
                                "nickname": "Luis Trujillo",
                                "_code": "GUA-466-Wdj",
                                "created_at": "2018-06-14 07:13:40",
                                "updated_at": "2018-06-14 07:13:40",
                                "puntos": 83
                            }
                        },
                        {
                            "user": {
                                "id": 1107,
                                "matricula": "18409",
                                "name": "Silvia Elizabeth Tzina Calí",
                                "email": "silvia.tzina@gmail.com",
                                "telefono": "55629608",
                                "nickname": "silvia.tzina",
                                "_code": "GUA-826-ODw",
                                "created_at": "2018-06-14 07:14:08",
                                "updated_at": "2018-06-14 07:14:08",
                                "puntos": 73
                            }
                        },
                        {
                            "user": {
                                "id": 1108,
                                "matricula": "12416",
                                "name": "MONTENEGRO DE VELASQUEZ ALVA JEANETH",
                                "email": "kevel99.montenegro@gmail.clm",
                                "telefono": "74596295",
                                "nickname": "Kevel99",
                                "_code": "SAL-016-vZQ",
                                "created_at": "2018-06-14 07:15:41",
                                "updated_at": "2018-06-14 07:15:41",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1109,
                                "matricula": "16744",
                                "name": "REYES CORZANTES LIONEL ALEJANDRO",
                                "email": "lionelalejandro@live.com",
                                "telefono": "54820658",
                                "nickname": "Lionel",
                                "_code": "GUA-599-KpN",
                                "created_at": "2018-06-14 07:16:29",
                                "updated_at": "2018-06-14 07:16:29",
                                "puntos": 103
                            }
                        },
                        {
                            "user": {
                                "id": 1110,
                                "matricula": "8411",
                                "name": "Randall Garzona Schmidt",
                                "email": "randallgarzona@gmail.com",
                                "telefono": "89237041",
                                "nickname": "Ran Gar 07",
                                "_code": "COR-323-Dqy",
                                "created_at": "2018-06-14 07:17:45",
                                "updated_at": "2018-06-14 07:17:45",
                                "puntos": 88
                            }
                        },
                        {
                            "user": {
                                "id": 1111,
                                "matricula": "1954",
                                "name": "Alejandro Kiste",
                                "email": "docalex25@hotmail.com",
                                "telefono": "30152238",
                                "nickname": "docalex25@hotmail.com",
                                "_code": "GUA-247-PnZ",
                                "created_at": "2018-06-14 07:21:06",
                                "updated_at": "2018-06-14 07:21:06",
                                "puntos": 71
                            }
                        },
                        {
                            "user": {
                                "id": 1112,
                                "matricula": "18593",
                                "name": "Claudia",
                                "email": "claudiavilleda.r@gmail.com",
                                "telefono": "58745232",
                                "nickname": "Clau",
                                "_code": "GUA-961-ZXI",
                                "created_at": "2018-06-14 07:21:25",
                                "updated_at": "2018-06-14 07:21:25",
                                "puntos": 119
                            }
                        },
                        {
                            "user": {
                                "id": 1113,
                                "matricula": "10043",
                                "name": "RIVAS FAJARDO SERGIO GIOVANNI",
                                "email": "genesis.rivasf@hotmail.com",
                                "telefono": "58063670",
                                "nickname": "Rivas",
                                "_code": "GUA-373-CbR",
                                "created_at": "2018-06-14 07:23:04",
                                "updated_at": "2018-06-14 07:23:04",
                                "puntos": 32
                            }
                        },
                        {
                            "user": {
                                "id": 1114,
                                "matricula": "1671",
                                "name": "AROSTEGUI TORRES MARVIN JOSE",
                                "email": "luis.kafie.lk@gamil.com",
                                "telefono": "33769939",
                                "nickname": "Marvin",
                                "_code": "HON-709-3s9",
                                "created_at": "2018-06-14 07:28:13",
                                "updated_at": "2018-06-14 07:28:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1115,
                                "matricula": "8838",
                                "name": "ALFARO PORRAS NORMAN",
                                "email": "normanalfaro81@gmail.com",
                                "telefono": "83544389",
                                "nickname": "Norman",
                                "_code": "COR-295-fGp",
                                "created_at": "2018-06-14 07:28:40",
                                "updated_at": "2018-06-14 07:28:40",
                                "puntos": 14
                            }
                        },
                        {
                            "user": {
                                "id": 1116,
                                "matricula": "150722",
                                "name": "jose",
                                "email": "dr.zelayareina@gmail.com",
                                "telefono": "98656598",
                                "nickname": "josedelacruz",
                                "_code": "HON-844-IVg",
                                "created_at": "2018-06-14 07:29:44",
                                "updated_at": "2018-06-14 07:29:44",
                                "puntos": 58
                            }
                        },
                        {
                            "user": {
                                "id": 1117,
                                "matricula": "13553",
                                "name": "Héctor Ureta",
                                "email": "hjureta@gmail.com",
                                "telefono": "54829493",
                                "nickname": "hjureta",
                                "_code": "GUA-831-Lbm",
                                "created_at": "2018-06-14 07:29:50",
                                "updated_at": "2018-06-14 07:29:50",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1118,
                                "matricula": "12144",
                                "name": "CAÑENGUEZ QUINTANILLA ROXANA FRANCISCA",
                                "email": "roxy.cq80@gmail.com",
                                "telefono": "7459-7813",
                                "nickname": "Roxana Cañenguez",
                                "_code": "SAL-253-vju",
                                "created_at": "2018-06-14 07:30:05",
                                "updated_at": "2018-06-14 07:30:05",
                                "puntos": 32
                            }
                        },
                        {
                            "user": {
                                "id": 1119,
                                "matricula": "9703",
                                "name": "PABLO ESTEBAN CARVAJAL MONTERO",
                                "email": "murova@hotmail.es",
                                "telefono": "87041439",
                                "nickname": "Dr Carvajal",
                                "_code": "COR-537-M3B",
                                "created_at": "2018-06-14 07:31:22",
                                "updated_at": "2018-06-14 07:31:22",
                                "puntos": 79
                            }
                        },
                        {
                            "user": {
                                "id": 1120,
                                "matricula": "11024",
                                "name": "HERBERT BERNABE. YUTAKA RAMOS",
                                "email": "hyutakar@hotmail.com",
                                "telefono": "55952616",
                                "nickname": "Her",
                                "_code": "GUA-651-HER",
                                "created_at": "2018-06-14 07:32:47",
                                "updated_at": "2018-06-14 07:32:47",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 1121,
                                "matricula": "13666",
                                "name": "Elmer Isaac Villalobos Mendoza",
                                "email": "evisaac31@gmail.com",
                                "telefono": "31579031",
                                "nickname": "Isaac vime",
                                "_code": "HON-029-ecT",
                                "created_at": "2018-06-14 07:32:47",
                                "updated_at": "2018-06-14 07:32:47",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 1122,
                                "matricula": "8414",
                                "name": "GODOY CUSTODIO MARIO EDUARDO",
                                "email": "arq_jose_godoy@hotmail.com",
                                "telefono": "40079044",
                                "nickname": "josefga",
                                "_code": "GUA-779-s0x",
                                "created_at": "2018-06-14 07:33:41",
                                "updated_at": "2018-06-14 07:33:41",
                                "puntos": 95
                            }
                        },
                        {
                            "user": {
                                "id": 1123,
                                "matricula": "17402",
                                "name": "ESTEFANY MEJIA SORTO",
                                "email": "tefitamejia2606@gmail.com",
                                "telefono": "71655224",
                                "nickname": "STEF",
                                "_code": "SAL-843-wSG",
                                "created_at": "2018-06-14 07:35:24",
                                "updated_at": "2018-06-14 07:35:24",
                                "puntos": 38
                            }
                        },
                        {
                            "user": {
                                "id": 1124,
                                "matricula": "9208",
                                "name": "AVILA CHACON EDWIN ARNOBIO",
                                "email": "eaag17.ea@gmail.com",
                                "telefono": "55182230",
                                "nickname": "El Pro Avila",
                                "_code": "GUA-165-F4e",
                                "created_at": "2018-06-14 07:36:41",
                                "updated_at": "2018-06-14 07:36:41",
                                "puntos": 55
                            }
                        },
                        {
                            "user": {
                                "id": 1125,
                                "matricula": "6205",
                                "name": "VALVERDE HERRERA JUAN DIEGO",
                                "email": "drdrdiego@yahoo.com",
                                "telefono": "83874756",
                                "nickname": "Docval",
                                "_code": "COR-622-MV2",
                                "created_at": "2018-06-14 07:41:10",
                                "updated_at": "2018-06-14 07:41:10",
                                "puntos": 48
                            }
                        },
                        {
                            "user": {
                                "id": 1126,
                                "matricula": "9148",
                                "name": "Carlos Enrique Tobar Contreras",
                                "email": "drcarlostobar@yahoo.com",
                                "telefono": "78506497",
                                "nickname": "STRIDECT",
                                "_code": "SAL-624-ejO",
                                "created_at": "2018-06-14 07:43:15",
                                "updated_at": "2018-06-14 07:43:15",
                                "puntos": 34
                            }
                        },
                        {
                            "user": {
                                "id": 1127,
                                "matricula": "14503",
                                "name": "TZOC PONCIO JOSE ORLANDO",
                                "email": "joseorlando2@yahoo.com",
                                "telefono": "52471412",
                                "nickname": "Orlando",
                                "_code": "GUA-109-AJm",
                                "created_at": "2018-06-14 07:43:31",
                                "updated_at": "2018-06-14 07:43:31",
                                "puntos": 68
                            }
                        },
                        {
                            "user": {
                                "id": 1128,
                                "matricula": "9941",
                                "name": "BERRIOS MONTIS LUIS ANTONIO",
                                "email": "labmwchinito@hotmail.com",
                                "telefono": "71298042",
                                "nickname": "Luis",
                                "_code": "SAL-276-LCf",
                                "created_at": "2018-06-14 07:44:39",
                                "updated_at": "2018-06-14 07:44:39",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1129,
                                "matricula": "10606",
                                "name": "SOSA DE GALDAMEZ JACKELINE",
                                "email": "drasosa96@hotmail.com",
                                "telefono": "7190-9187",
                                "nickname": "JACKY",
                                "_code": "SAL-441-DQP",
                                "created_at": "2018-06-14 07:47:22",
                                "updated_at": "2018-06-14 07:47:22",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 1130,
                                "matricula": "3805",
                                "name": "VILLANUEVA PATRICIA ARYERY",
                                "email": "argeryvilla@gmail.com",
                                "telefono": "99392823",
                                "nickname": "Doctora",
                                "_code": "HON-462-gTE",
                                "created_at": "2018-06-14 07:48:47",
                                "updated_at": "2018-06-14 07:48:47",
                                "puntos": 32
                            }
                        },
                        {
                            "user": {
                                "id": 1131,
                                "matricula": "2138",
                                "name": "José Manuel Matheu Amaya",
                                "email": "jmmatheu2001@yahoo.com",
                                "telefono": "99011315",
                                "nickname": "Matheuski",
                                "_code": "HON-989-my3",
                                "created_at": "2018-06-14 07:49:07",
                                "updated_at": "2018-06-14 07:49:07",
                                "puntos": 47
                            }
                        },
                        {
                            "user": {
                                "id": 1132,
                                "matricula": "8987",
                                "name": "Byron Cerrato",
                                "email": "drcerrato219@gmail.com",
                                "telefono": "31850167",
                                "nickname": "drcerrato219",
                                "_code": "HON-963-TWM",
                                "created_at": "2018-06-14 07:49:59",
                                "updated_at": "2018-07-06 09:16:19",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1133,
                                "matricula": "7931",
                                "name": "FLORES BOGRAN REBECA",
                                "email": "rebecookie84@gmail.com",
                                "telefono": "97983951",
                                "nickname": "Cookie",
                                "_code": "HON-914-2fA",
                                "created_at": "2018-06-14 07:52:52",
                                "updated_at": "2018-06-14 07:52:52",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1134,
                                "matricula": "12677",
                                "name": "LOPEZ DE LEON LOIDA MARINELLY",
                                "email": "lolydeleon@yahoo.es",
                                "telefono": "50489486",
                                "nickname": "Loliña",
                                "_code": "GUA-852-OLg",
                                "created_at": "2018-06-14 07:52:58",
                                "updated_at": "2018-06-14 07:52:58",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1135,
                                "matricula": "20507",
                                "name": "RUIZ ANTHONY",
                                "email": "asrldroopy@hotmail.com",
                                "telefono": "58440196",
                                "nickname": "AnthonyRuiz",
                                "_code": "GUA-205-wY7",
                                "created_at": "2018-06-14 07:53:18",
                                "updated_at": "2018-06-14 07:53:18",
                                "puntos": 102
                            }
                        },
                        {
                            "user": {
                                "id": 1136,
                                "matricula": "15239",
                                "name": "Patricia Cardona Galindo",
                                "email": "drapsiquiantigua@gmail.com",
                                "telefono": "58725026",
                                "nickname": "KittyKat22",
                                "_code": "GUA-477-AHe",
                                "created_at": "2018-06-14 07:55:24",
                                "updated_at": "2018-06-14 07:55:24",
                                "puntos": 42
                            }
                        },
                        {
                            "user": {
                                "id": 1137,
                                "matricula": "9534",
                                "name": "Sidia Nasser Carrasco",
                                "email": "sidianasser@hotmail.com",
                                "telefono": "98741125",
                                "nickname": "Dra.Nasser",
                                "_code": "HON-864-UMz",
                                "created_at": "2018-06-14 08:00:10",
                                "updated_at": "2018-06-14 08:00:10",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1138,
                                "matricula": "17069",
                                "name": "SAJQUIM EDVIN EDUARDO",
                                "email": "rocio212@hotmail.com",
                                "telefono": "56309368",
                                "nickname": "EdvinS",
                                "_code": "GUA-239-h4Z",
                                "created_at": "2018-06-14 08:03:57",
                                "updated_at": "2018-06-14 08:03:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1139,
                                "matricula": "5464",
                                "name": "PRIETO GLENDA",
                                "email": "gprietofa@yahoo.com",
                                "telefono": "99773960",
                                "nickname": "Mari",
                                "_code": "HON-340-Xf4",
                                "created_at": "2018-06-14 08:05:08",
                                "updated_at": "2018-06-14 08:05:08",
                                "puntos": 110
                            }
                        },
                        {
                            "user": {
                                "id": 1140,
                                "matricula": "7786",
                                "name": "Ileana Lizeth Giron Cruz",
                                "email": "ilegiron_523@yahoo.com",
                                "telefono": "9481-0430",
                                "nickname": "Ile",
                                "_code": "HON-170-wYM",
                                "created_at": "2018-06-14 08:05:08",
                                "updated_at": "2018-06-14 08:05:08",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1141,
                                "matricula": "17331",
                                "name": "CORZANTES MORALES GANDHI LENIN",
                                "email": "gandhicorzantes@yahoo.com.mx",
                                "telefono": "30255134",
                                "nickname": "Gandhi Corzantes",
                                "_code": "GUA-185-3AY",
                                "created_at": "2018-06-14 08:06:34",
                                "updated_at": "2018-06-14 08:06:34",
                                "puntos": 78
                            }
                        },
                        {
                            "user": {
                                "id": 1142,
                                "matricula": "11107",
                                "name": "JUAREZ RODRIGUEZ DAMARIS HILDA",
                                "email": "damarisjua@gmail.com",
                                "telefono": "(502) 55107138",
                                "nickname": "Dam",
                                "_code": "GUA-285-cC9",
                                "created_at": "2018-06-14 08:06:54",
                                "updated_at": "2018-06-14 08:06:54",
                                "puntos": 13
                            }
                        },
                        {
                            "user": {
                                "id": 1143,
                                "matricula": "4389",
                                "name": "Dioxana Catalina López Lopez",
                                "email": "dioxlopez0610@yahoo.com",
                                "telefono": "50497981187",
                                "nickname": "Dioxa",
                                "_code": "HON-500-UFt",
                                "created_at": "2018-06-14 08:08:03",
                                "updated_at": "2018-06-14 08:08:03",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 1144,
                                "matricula": "15469",
                                "name": "ALVAREZ DE LEON LUISA MARIA",
                                "email": "luisa.alvarez3@hotmail.com",
                                "telefono": "30853729",
                                "nickname": "Luisa39",
                                "_code": "GUA-726-Nu7",
                                "created_at": "2018-06-14 08:08:11",
                                "updated_at": "2018-06-14 08:08:11",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1145,
                                "matricula": "3485",
                                "name": "DIAZ LOPEZ JUAN MANUEL",
                                "email": "jumadi_lou@hotmail.com",
                                "telefono": "57161930",
                                "nickname": "Juan Manuel Diaz Lopez",
                                "_code": "GUA-368-uUb",
                                "created_at": "2018-06-14 08:10:10",
                                "updated_at": "2018-06-14 08:10:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1146,
                                "matricula": "16239",
                                "name": "GOMEZ MARTINEZ KRYSSIA LISSETTE",
                                "email": "klgomez@outlook.es",
                                "telefono": "79277559",
                                "nickname": "Kryssia Gomez",
                                "_code": "SAL-942-Amg",
                                "created_at": "2018-06-14 08:13:01",
                                "updated_at": "2018-06-14 08:13:01",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1147,
                                "matricula": "10006",
                                "name": "YOANA LOPEZ",
                                "email": "myro96@yahoo.com",
                                "telefono": "99339561",
                                "nickname": "yoanapatricia",
                                "_code": "HON-809-a07",
                                "created_at": "2018-06-14 08:13:41",
                                "updated_at": "2018-06-14 08:13:41",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1148,
                                "matricula": "8255",
                                "name": "AGUILERA DURON XENIA MAGALY",
                                "email": "xeniaguilera@hotmail.com",
                                "telefono": "94595749",
                                "nickname": "leonas",
                                "_code": "HON-851-Z2e",
                                "created_at": "2018-06-14 08:14:17",
                                "updated_at": "2018-06-14 08:14:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1149,
                                "matricula": "11011",
                                "name": "ORELLANA HERNANDEZ SANDRA MARISELA",
                                "email": "sandra8orellana@gmail.com",
                                "telefono": "98237957",
                                "nickname": "Sandra_0rellana",
                                "_code": "HON-450-b8B",
                                "created_at": "2018-06-14 08:14:49",
                                "updated_at": "2018-06-14 08:14:49",
                                "puntos": 82
                            }
                        },
                        {
                            "user": {
                                "id": 1150,
                                "matricula": "15687",
                                "name": "VICENTE KEVIN",
                                "email": "dr.kvicente@gmail.com",
                                "telefono": "30440231",
                                "nickname": "Titoliv",
                                "_code": "GUA-607-v7s",
                                "created_at": "2018-06-14 08:14:52",
                                "updated_at": "2018-06-14 08:14:52",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1151,
                                "matricula": "10148",
                                "name": "RUANO MUÑOZ KARINA JUDITH",
                                "email": "teamruano1234@gmail.com",
                                "telefono": "+502 77769256",
                                "nickname": "Manuelba",
                                "_code": "GUA-120-28H",
                                "created_at": "2018-06-14 08:14:54",
                                "updated_at": "2018-06-14 08:14:54",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1152,
                                "matricula": "2308",
                                "name": "RODAS VELASQUEZ HUGO ROLANDO",
                                "email": "huhgrod@gmail.com",
                                "telefono": "56120064",
                                "nickname": "Hugo",
                                "_code": "GUA-062-3pz",
                                "created_at": "2018-06-14 08:16:32",
                                "updated_at": "2018-06-14 08:16:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1153,
                                "matricula": "10907",
                                "name": "MOIR RODAS MARIO RUBEN",
                                "email": "mariorub@hotmail.com",
                                "telefono": "55027990",
                                "nickname": "Mario",
                                "_code": "Gua-663-7rm",
                                "created_at": "2018-06-14 08:18:03",
                                "updated_at": "2018-06-14 08:22:48",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1154,
                                "matricula": "7588",
                                "name": "MORALES DAVILA, LUIS FELIPE",
                                "email": "dr.luismorales01@gmail.com",
                                "telefono": "59060494",
                                "nickname": "drluismorales01",
                                "_code": "GUA-358-OZE",
                                "created_at": "2018-06-14 08:18:36",
                                "updated_at": "2018-06-14 08:18:36",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1155,
                                "matricula": "2356",
                                "name": "Vera Selva Delgado",
                                "email": "iserrano_1994@hotmail.com",
                                "telefono": "83167092",
                                "nickname": "vselva",
                                "_code": "COR-603-iWn",
                                "created_at": "2018-06-14 08:18:59",
                                "updated_at": "2018-06-14 08:18:59",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1156,
                                "matricula": "3138",
                                "name": "AGUILAR LOPEZ MARIO FRANCISCO",
                                "email": "mfaguilar88@yahoo.com",
                                "telefono": "9995-8523",
                                "nickname": "Don Marito",
                                "_code": "HON-352-SI0",
                                "created_at": "2018-06-14 08:20:10",
                                "updated_at": "2018-06-14 08:20:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1157,
                                "matricula": "11871",
                                "name": "Glenda Vanesa Gomez Aceytuno",
                                "email": "glenvanea@yahoo.com",
                                "telefono": "48939581",
                                "nickname": "Flaca",
                                "_code": "GUA-125-Tdw",
                                "created_at": "2018-06-14 08:21:46",
                                "updated_at": "2018-06-14 08:21:46",
                                "puntos": 81
                            }
                        },
                        {
                            "user": {
                                "id": 1158,
                                "matricula": "21611355",
                                "name": "Estrada Ely",
                                "email": "elitaestrada31@gmail.com",
                                "telefono": "32684125",
                                "nickname": "Ely",
                                "_code": "HON-424-7eh",
                                "created_at": "2018-06-14 08:22:07",
                                "updated_at": "2018-06-14 08:22:07",
                                "puntos": 57
                            }
                        },
                        {
                            "user": {
                                "id": 1159,
                                "matricula": "10769",
                                "name": "ARENAS URIZAR JEANNETTE MARICELA",
                                "email": "jeansaren@yahoo.com",
                                "telefono": "56071550",
                                "nickname": "Dra. Arenas",
                                "_code": "GUA-109-stm",
                                "created_at": "2018-06-14 08:23:30",
                                "updated_at": "2018-06-30 09:08:45",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1160,
                                "matricula": "21703113",
                                "name": "Yair Izaguirre",
                                "email": "yairfox19@hotmail.com",
                                "telefono": "33047356",
                                "nickname": "Yair",
                                "_code": "HON-626-mDA",
                                "created_at": "2018-06-14 08:24:55",
                                "updated_at": "2018-06-14 08:24:55",
                                "puntos": 28
                            }
                        },
                        {
                            "user": {
                                "id": 1161,
                                "matricula": "21703114",
                                "name": "Samanta Yasmin Irías Espinoza",
                                "email": "samantairias@hotmail.com",
                                "telefono": "96395083",
                                "nickname": "Samanta",
                                "_code": "HON-796-tn1",
                                "created_at": "2018-06-14 08:25:15",
                                "updated_at": "2018-06-14 08:25:15",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1162,
                                "matricula": "14601",
                                "name": "Bertha Lidia Arreaga Medina",
                                "email": "blam2u@hotmail.com",
                                "telefono": "55584202",
                                "nickname": "BLAM",
                                "_code": "GUA-745-Glj",
                                "created_at": "2018-06-14 08:25:24",
                                "updated_at": "2018-06-14 10:44:36",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 1163,
                                "matricula": "13523",
                                "name": "DIAZ MIJANGOS MARCOS NOE",
                                "email": "drdiaz@respiragt.com",
                                "telefono": "42250801",
                                "nickname": "MDantigua",
                                "_code": "GUA-439-rUO",
                                "created_at": "2018-06-14 08:26:22",
                                "updated_at": "2018-06-14 08:26:22",
                                "puntos": 32
                            }
                        },
                        {
                            "user": {
                                "id": 1164,
                                "matricula": "12416",
                                "name": "MONTENEGRO DE VASQUEZ ALVA JEANETH",
                                "email": "kevel99.montenegro@gmail.com",
                                "telefono": "74596295",
                                "nickname": "Kalexander",
                                "_code": "SAL-741-wDH",
                                "created_at": "2018-06-14 08:26:42",
                                "updated_at": "2018-06-14 08:26:42",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 1165,
                                "matricula": "18185",
                                "name": "Maxsuel Xiloj",
                                "email": "maxdx89@gmail.com",
                                "telefono": "30092683",
                                "nickname": "Maximus",
                                "_code": "GUA-695-n3t",
                                "created_at": "2018-06-14 08:27:54",
                                "updated_at": "2018-06-14 08:27:54",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1166,
                                "matricula": "103206",
                                "name": "Roberto Enrique Mejia Rodríguez",
                                "email": "robmejtl@yahoo.com",
                                "telefono": "504-96740173",
                                "nickname": "Betio",
                                "_code": "HON-828-xEj",
                                "created_at": "2018-06-14 08:28:06",
                                "updated_at": "2018-06-14 08:28:06",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1167,
                                "matricula": "10574",
                                "name": "CHIROY MUÑOZ ROSA JULIA",
                                "email": "albamelendez@outlook.com",
                                "telefono": "42108583",
                                "nickname": "Rosaj",
                                "_code": "GUA-509-MZ3",
                                "created_at": "2018-06-14 08:28:54",
                                "updated_at": "2018-06-14 08:28:54",
                                "puntos": 77
                            }
                        },
                        {
                            "user": {
                                "id": 1168,
                                "matricula": "10717",
                                "name": "PERDOMO PAZ ALDO HORACIO",
                                "email": "aldoath@hotmail.com",
                                "telefono": "94961003",
                                "nickname": "Aldo Perdomo",
                                "_code": "HON-651-UgO",
                                "created_at": "2018-06-14 08:29:55",
                                "updated_at": "2018-06-14 08:29:55",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1169,
                                "matricula": "18641",
                                "name": "MARTINEZ CARLOS RODERICO",
                                "email": "carlosmart86@gmail.com",
                                "telefono": "45976943",
                                "nickname": "Ficus",
                                "_code": "GUA-598-GU0",
                                "created_at": "2018-06-14 08:31:24",
                                "updated_at": "2018-06-14 08:31:24",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1170,
                                "matricula": "5824",
                                "name": "GIRON DE ARREAGA CARMEN PATRICIA",
                                "email": "ka_sanchezsamayoa@outlook.com",
                                "telefono": "42220709",
                                "nickname": "PArreaga",
                                "_code": "GUA-013-boo",
                                "created_at": "2018-06-14 08:33:54",
                                "updated_at": "2018-06-14 08:33:54",
                                "puntos": 97
                            }
                        },
                        {
                            "user": {
                                "id": 1171,
                                "matricula": "3840",
                                "name": "RIVERA  BOLAÑOS  ERWIN",
                                "email": "erwinriverab@yahoo.com",
                                "telefono": "24780024",
                                "nickname": "Riverita",
                                "_code": "Gua-872-fxc",
                                "created_at": "2018-06-14 08:34:56",
                                "updated_at": "2018-06-14 08:34:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1172,
                                "matricula": "15309",
                                "name": "chato",
                                "email": "victorarl85@gmail.com",
                                "telefono": "47004198",
                                "nickname": "chato",
                                "_code": "GUA-043-9el",
                                "created_at": "2018-06-14 08:37:41",
                                "updated_at": "2018-06-14 08:37:41",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1173,
                                "matricula": "10620",
                                "name": "AVILA RECINOS MARCO VINICIO",
                                "email": "gabyalejandrina123@hotmail.com",
                                "telefono": "59078104",
                                "nickname": "Vinicio",
                                "_code": "GUA-873-WVm",
                                "created_at": "2018-06-14 08:42:24",
                                "updated_at": "2018-06-14 08:42:24",
                                "puntos": 61
                            }
                        },
                        {
                            "user": {
                                "id": 1174,
                                "matricula": "14521",
                                "name": "Julio Molina Canales",
                                "email": "juliomol09@gmail.com",
                                "telefono": "61000383",
                                "nickname": "juliomol09",
                                "_code": "COR-902-Kr1",
                                "created_at": "2018-06-14 08:44:28",
                                "updated_at": "2018-06-14 08:44:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1175,
                                "matricula": "5335",
                                "name": "Nelson  marin",
                                "email": "medicohn@gmail.com",
                                "telefono": "94777999",
                                "nickname": "Nelson",
                                "_code": "HON-975-JFY",
                                "created_at": "2018-06-14 08:44:51",
                                "updated_at": "2018-06-14 08:44:51",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1176,
                                "matricula": "24041513357",
                                "name": "Kisha",
                                "email": "kishasanders08@gmail.com",
                                "telefono": "32754889",
                                "nickname": "kisha",
                                "_code": "HON-595-T6a",
                                "created_at": "2018-06-14 08:47:30",
                                "updated_at": "2018-06-14 08:47:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1177,
                                "matricula": "5414",
                                "name": "BUSTILLO LUIS ARMANDO",
                                "email": "lbustillo27@hotmail.com",
                                "telefono": "77437677",
                                "nickname": "LABC07",
                                "_code": "SAL-450-9s4",
                                "created_at": "2018-06-14 08:49:29",
                                "updated_at": "2018-06-14 08:49:29",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1178,
                                "matricula": "1073",
                                "name": "Mario Enrique colindres Carcamo",
                                "email": "mario_colindres@hotmail.com",
                                "telefono": "99792510",
                                "nickname": "escorpion",
                                "_code": "HON-753-94w",
                                "created_at": "2018-06-14 08:49:36",
                                "updated_at": "2018-06-14 08:49:36",
                                "puntos": 39
                            }
                        },
                        {
                            "user": {
                                "id": 1179,
                                "matricula": "5941",
                                "name": "ZAMORA  RENE",
                                "email": "mdrezam@yahoo.es",
                                "telefono": "52080132",
                                "nickname": "Rene",
                                "_code": "GUA-669-xOy",
                                "created_at": "2018-06-14 08:50:35",
                                "updated_at": "2018-06-14 08:50:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1181,
                                "matricula": "14732",
                                "name": "MOGOLLON DE ESCOBAR KARLA",
                                "email": "karlamesc@yahoo.es",
                                "telefono": "51208417",
                                "nickname": "Karla",
                                "_code": "GUA-023-Epi",
                                "created_at": "2018-06-14 08:51:46",
                                "updated_at": "2018-07-06 09:39:22",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 1182,
                                "matricula": "12443",
                                "name": "Werner Hernández González",
                                "email": "wernernandez@gmail.com",
                                "telefono": "7450-8140",
                                "nickname": "WERNER",
                                "_code": "SAL-080-ALC",
                                "created_at": "2018-06-14 08:51:47",
                                "updated_at": "2018-06-14 08:51:47",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1183,
                                "matricula": "11282",
                                "name": "GONZALEZ  JOACHIN  ROBINS  ANTONIO",
                                "email": "gonzalez.robins@gmail.com",
                                "telefono": "42111936",
                                "nickname": "Colocho",
                                "_code": "GUA-438-1qx",
                                "created_at": "2018-06-14 08:52:36",
                                "updated_at": "2018-06-14 08:52:36",
                                "puntos": 41
                            }
                        },
                        {
                            "user": {
                                "id": 1184,
                                "matricula": "15501",
                                "name": "MARIN MYNOR ALEXIS",
                                "email": "marinrys3@gmail.com",
                                "telefono": "57157282",
                                "nickname": "marinvasquez2018",
                                "_code": "GUA-992-YZR",
                                "created_at": "2018-06-14 08:53:45",
                                "updated_at": "2018-06-14 08:53:45",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1185,
                                "matricula": "14693",
                                "name": "Carlos Rogelio Cifuentes",
                                "email": "carlospediapci@gmail.com",
                                "telefono": "48403466",
                                "nickname": "Dr.charly",
                                "_code": "GUA-340-ej7",
                                "created_at": "2018-06-14 08:56:44",
                                "updated_at": "2018-06-14 08:56:44",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1186,
                                "matricula": "3049",
                                "name": "Oscar. Benítez Cerrato",
                                "email": "oscarbcmg@yahoo.com",
                                "telefono": "31762210",
                                "nickname": "Oscar",
                                "_code": "HON-059-fne",
                                "created_at": "2018-06-14 08:57:49",
                                "updated_at": "2018-06-14 08:57:49",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 1187,
                                "matricula": "2748",
                                "name": "GARCIA RAMIREZ HERMES",
                                "email": "carlosfcb2011@hotmail.com",
                                "telefono": "98656340",
                                "nickname": "Carlos",
                                "_code": "HON-423-yfr",
                                "created_at": "2018-06-14 09:01:32",
                                "updated_at": "2018-06-14 09:01:32",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1188,
                                "matricula": "3443",
                                "name": "JUAN RAMON ,MAGAÑA",
                                "email": "jrmagana42@hotmail.com",
                                "telefono": "22743908",
                                "nickname": "juanramon2",
                                "_code": "SAL-776-Y66",
                                "created_at": "2018-06-14 09:03:58",
                                "updated_at": "2018-06-14 09:03:58",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1189,
                                "matricula": "4464",
                                "name": "SACAZA JACKSON TONY ALEXANDER",
                                "email": "alexjackson_69@yahoo.com",
                                "telefono": "32272080",
                                "nickname": "Tony",
                                "_code": "HON-934-Jdx",
                                "created_at": "2018-06-14 09:05:52",
                                "updated_at": "2018-07-01 23:23:12",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1190,
                                "matricula": "7833",
                                "name": "María Elena del Rosario Alcántara Godoy",
                                "email": "doctora99@gmail.com",
                                "telefono": "+50230004549",
                                "nickname": "Doctora Paliativos",
                                "_code": "GUA-304-rdm",
                                "created_at": "2018-06-14 09:05:54",
                                "updated_at": "2018-06-14 09:05:54",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 1191,
                                "matricula": "10787",
                                "name": "Daniel",
                                "email": "drdanielmonterob@gmail.com",
                                "telefono": "88135407",
                                "nickname": "DRDMB",
                                "_code": "COR-121-PB5",
                                "created_at": "2018-06-14 09:07:03",
                                "updated_at": "2018-07-04 05:54:21",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 1192,
                                "matricula": "20507",
                                "name": "RUIZ ANTHONY",
                                "email": "anthonyruiz@intramed.net",
                                "telefono": "58440196",
                                "nickname": "AnthonyLopez",
                                "_code": "GUA-142-cMq",
                                "created_at": "2018-06-14 09:07:42",
                                "updated_at": "2018-06-14 09:07:42",
                                "puntos": 115
                            }
                        },
                        {
                            "user": {
                                "id": 1193,
                                "matricula": "10803",
                                "name": "BRAVO VEGA HENRY DANILO",
                                "email": "hbravo_02@hotmail.com",
                                "telefono": "50170787",
                                "nickname": "Bravito",
                                "_code": "GUA-734-uoM",
                                "created_at": "2018-06-14 09:07:47",
                                "updated_at": "2018-06-14 09:07:47",
                                "puntos": 19
                            }
                        },
                        {
                            "user": {
                                "id": 1194,
                                "matricula": "15347",
                                "name": "Sebastián Buján Murillo",
                                "email": "sebas11bm@hotmail.com",
                                "telefono": "88713864",
                                "nickname": "SebasBM",
                                "_code": "COR-446-fHh",
                                "created_at": "2018-06-14 09:08:54",
                                "updated_at": "2018-06-14 09:08:54",
                                "puntos": 116
                            }
                        },
                        {
                            "user": {
                                "id": 1195,
                                "matricula": "13376",
                                "name": "Meredith Umaña",
                                "email": "merug0387@gmail.com",
                                "telefono": "88884499",
                                "nickname": "Merug",
                                "_code": "COR-312-1aT",
                                "created_at": "2018-06-14 09:09:43",
                                "updated_at": "2018-06-14 09:09:43",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1196,
                                "matricula": "3269",
                                "name": "CROCKER CORDOVA GUILLERMO",
                                "email": "lissckg@gmail.com",
                                "telefono": "34032333",
                                "nickname": "Willycrocker",
                                "_code": "GUA-278-mh5",
                                "created_at": "2018-06-14 09:10:09",
                                "updated_at": "2018-06-14 09:10:09",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1197,
                                "matricula": "7509",
                                "name": "PALOMO ARCHILA EDNA GRACIELA",
                                "email": "ednapalomo@gmail.com",
                                "telefono": "+502 5312-7662",
                                "nickname": "eni05",
                                "_code": "GUA-654-wRL",
                                "created_at": "2018-06-14 09:12:54",
                                "updated_at": "2018-06-14 09:12:54",
                                "puntos": 22
                            }
                        },
                        {
                            "user": {
                                "id": 1198,
                                "matricula": "15116",
                                "name": "SANABRIA HESLER DANILO",
                                "email": "hesler_doc@hotmail.com",
                                "telefono": "56942819",
                                "nickname": "Hesdoc",
                                "_code": "GUA-975-EKr",
                                "created_at": "2018-06-14 09:13:31",
                                "updated_at": "2018-06-14 09:13:31",
                                "puntos": 38
                            }
                        },
                        {
                            "user": {
                                "id": 1199,
                                "matricula": "8785",
                                "name": "Marlin Dalila Diaz",
                                "email": "daliladv@hotmail.com",
                                "telefono": "99029197",
                                "nickname": "Lila84",
                                "_code": "HON-000-8ti",
                                "created_at": "2018-06-14 09:14:38",
                                "updated_at": "2018-06-14 09:14:38",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1200,
                                "matricula": "4395",
                                "name": "Nery Erasmo Linarez Ochoa",
                                "email": "linareochoa@hotmail.com",
                                "telefono": "+50499301124",
                                "nickname": "NELO",
                                "_code": "HON-584-TJx",
                                "created_at": "2018-06-14 09:15:09",
                                "updated_at": "2018-06-14 09:15:09",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1201,
                                "matricula": "15618",
                                "name": "ALVAREZ ALVAREZ BEATRIZ NOHEMI",
                                "email": "abeatriz@yahoo.com",
                                "telefono": "42177272",
                                "nickname": "BeaAlvarez",
                                "_code": "GUA-662-jcZ",
                                "created_at": "2018-06-14 09:19:56",
                                "updated_at": "2018-06-14 09:19:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1202,
                                "matricula": "4631",
                                "name": "LEON DE ROGEL DINIRI DE",
                                "email": "diniri1032007@yahoo.es",
                                "telefono": "74506170",
                                "nickname": "Diniri",
                                "_code": "SAL-900-dkD",
                                "created_at": "2018-06-14 09:20:45",
                                "updated_at": "2018-06-14 09:20:45",
                                "puntos": 28
                            }
                        },
                        {
                            "user": {
                                "id": 1203,
                                "matricula": "6253",
                                "name": "MARTINEZ RODRIGUEZ PABLO ALBERTO",
                                "email": "pablo77medicinamaternofetal@hotmail.com",
                                "telefono": "33 913390",
                                "nickname": "Pablo Martinez",
                                "_code": "HON-458-7Zu",
                                "created_at": "2018-06-14 09:21:37",
                                "updated_at": "2018-06-14 09:21:37",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1204,
                                "matricula": "15878",
                                "name": "JULAJUJ CHAMALÉ JOAQUIN HERIBERTO",
                                "email": "joaquinchobarrilete@gmail.com",
                                "telefono": "41911199",
                                "nickname": "Quincho",
                                "_code": "GUA-087-CVa",
                                "created_at": "2018-06-14 09:27:45",
                                "updated_at": "2018-06-14 09:27:45",
                                "puntos": 10
                            }
                        },
                        {
                            "user": {
                                "id": 1205,
                                "matricula": "15469",
                                "name": "ALVAREZ DE LEON LUISA MARIA",
                                "email": "luisa.alvarz3@hotmail.com",
                                "telefono": "30853729",
                                "nickname": "alvarezluisamaria",
                                "_code": "GUA-967-mom",
                                "created_at": "2018-06-14 09:28:40",
                                "updated_at": "2018-06-14 09:28:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1206,
                                "matricula": "15855",
                                "name": "Galindo Silvia Paola",
                                "email": "dra.sgalindo@gmail.com",
                                "telefono": "56332633",
                                "nickname": "silvia.galindo",
                                "_code": "GUA-865-Zxd",
                                "created_at": "2018-06-14 09:38:44",
                                "updated_at": "2018-06-14 09:38:44",
                                "puntos": 20
                            }
                        },
                        {
                            "user": {
                                "id": 1207,
                                "matricula": "7344",
                                "name": "FUENTES GODINEZ MARVIN LEONEL",
                                "email": "eduardo14alvarado91@gmail.com",
                                "telefono": "41512609",
                                "nickname": "Leonel",
                                "_code": "GUA-775-k53",
                                "created_at": "2018-06-14 09:38:59",
                                "updated_at": "2018-06-14 09:38:59",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1208,
                                "matricula": "21200",
                                "name": "Lucía Jamileth García Morales",
                                "email": "garciamlucia@hotmail.com",
                                "telefono": "58681067",
                                "nickname": "Lulú",
                                "_code": "GUA-596-Xhn",
                                "created_at": "2018-06-14 09:48:59",
                                "updated_at": "2018-06-14 09:48:59",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1209,
                                "matricula": "6624",
                                "name": "OSEGUEDA LOZANO NAPOLEON ROMEO",
                                "email": "napo89@hotmail.com",
                                "telefono": "79795223",
                                "nickname": "NapoOsegueda",
                                "_code": "sal-497-xl9",
                                "created_at": "2018-06-14 09:51:01",
                                "updated_at": "2018-06-14 09:51:01",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1210,
                                "matricula": "9798",
                                "name": "VALENCIA VILLEDA YOHAMY GUADALUPE",
                                "email": "drayohamyvalencia@yahoo.com",
                                "telefono": "7180 0587",
                                "nickname": "Yohamy",
                                "_code": "SAL-088-vqV",
                                "created_at": "2018-06-14 09:52:18",
                                "updated_at": "2018-06-14 09:52:18",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 1211,
                                "matricula": "15278",
                                "name": "NO NAME - NEW USER",
                                "email": "rocajanethe@yahoo.com.mx",
                                "telefono": "58792073",
                                "nickname": "Jan",
                                "_code": "GUA-479-teB",
                                "created_at": "2018-06-14 09:52:53",
                                "updated_at": "2018-06-14 09:52:53",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1212,
                                "matricula": "9939",
                                "name": "Marilin Yasel Vasquez Bonilla",
                                "email": "mariyasel20@hotmail.com",
                                "telefono": "96365897",
                                "nickname": "Marilin",
                                "_code": "HON-070-D3B",
                                "created_at": "2018-06-14 09:53:28",
                                "updated_at": "2018-06-14 15:56:45",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1213,
                                "matricula": "6300",
                                "name": "Gilkia Mayabel Gonzalez Monterroso",
                                "email": "castellanos.mj@outlook.com",
                                "telefono": "51352637",
                                "nickname": "kika",
                                "_code": "GUA-110-fi1",
                                "created_at": "2018-06-14 10:00:19",
                                "updated_at": "2018-06-14 10:00:19",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 1214,
                                "matricula": "13195",
                                "name": "Luis Varela",
                                "email": "lvarela00@gmail.com",
                                "telefono": "83710784",
                                "nickname": "lvarela",
                                "_code": "COR-486-ozx",
                                "created_at": "2018-06-14 10:00:41",
                                "updated_at": "2018-06-14 10:00:41",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1215,
                                "matricula": "18186",
                                "name": "Raul",
                                "email": "mikbaiza7@gmail.com",
                                "telefono": "46489098",
                                "nickname": "Baiza",
                                "_code": "GUA-876-pAh",
                                "created_at": "2018-06-14 12:08:14",
                                "updated_at": "2018-06-14 12:08:14",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1216,
                                "matricula": "13402",
                                "name": "ARTEAGA MARCIO",
                                "email": "m.art.ber@hotmail.com",
                                "telefono": "84374450",
                                "nickname": "Doctor Marcio",
                                "_code": "NIC-329-oCE",
                                "created_at": "2018-06-14 13:52:17",
                                "updated_at": "2018-06-14 13:52:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1217,
                                "matricula": "9248",
                                "name": "GONZALES MEJIA KAREN LILIANA",
                                "email": "kaligome12@gmail.com",
                                "telefono": "99313551",
                                "nickname": "Gonzalez",
                                "_code": "Hon-268-52u",
                                "created_at": "2018-06-14 15:27:48",
                                "updated_at": "2018-06-14 15:27:48",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1218,
                                "matricula": "9939",
                                "name": "Marilin Yasel Vasquez",
                                "email": "mariyase20@gmail.com",
                                "telefono": "+504 96365897",
                                "nickname": "Morenita",
                                "_code": "HON-281-MS2",
                                "created_at": "2018-06-14 15:53:53",
                                "updated_at": "2018-06-14 15:53:53",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1219,
                                "matricula": "7865",
                                "name": "LOPEZ PAREDES OCTAVIO EDUARDO",
                                "email": "ocedlopar@yahoo.com",
                                "telefono": "94796055",
                                "nickname": "Oku",
                                "_code": "HON-679-PN2",
                                "created_at": "2018-06-14 16:11:41",
                                "updated_at": "2018-06-14 16:11:41",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1220,
                                "matricula": "12590",
                                "name": "Manuel de Jesús Asencio Fajardo",
                                "email": "manuel_fajardo_md@hotmail.com",
                                "telefono": "7450-8233",
                                "nickname": "manuelasencio82",
                                "_code": "SAL-709-CNN",
                                "created_at": "2018-06-14 16:11:41",
                                "updated_at": "2018-07-05 14:37:59",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1221,
                                "matricula": "7414",
                                "name": "RENAN OSBERTO POZUELOS",
                                "email": "renanpozuelos@hotmail.com",
                                "telefono": "(502) 77656551",
                                "nickname": "QUICHÉ",
                                "_code": "GUA-564-ONe",
                                "created_at": "2018-06-14 16:29:44",
                                "updated_at": "2018-06-14 16:29:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1222,
                                "matricula": "8633",
                                "name": "MATTA  FURLAN  PAULA  VERONICA",
                                "email": "veromatafurlan@hotmail.com",
                                "telefono": "55141580",
                                "nickname": "Pauly",
                                "_code": "GUA-832-ONz",
                                "created_at": "2018-06-14 16:38:07",
                                "updated_at": "2018-06-14 16:38:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1223,
                                "matricula": "13066",
                                "name": "RODAS ARANGO ALEX ESTUARDO",
                                "email": "xelaera@hotmail.com",
                                "telefono": "56988389",
                                "nickname": "Alex",
                                "_code": "GUA-078-oY8",
                                "created_at": "2018-06-14 16:42:28",
                                "updated_at": "2018-06-14 16:42:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1224,
                                "matricula": "8222",
                                "name": "RODRIGUEZ SANCHEZ EDWIN ANTONIO",
                                "email": "ginecoloco@gmail.com",
                                "telefono": "54119202",
                                "nickname": "Edwin ROdriguez",
                                "_code": "GUA-398-OwO",
                                "created_at": "2018-06-14 16:52:07",
                                "updated_at": "2018-06-14 16:52:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1225,
                                "matricula": "9855",
                                "name": "Higinio Chavez",
                                "email": "hchavezmd@yahoo.com",
                                "telefono": "+50240528003",
                                "nickname": "----------",
                                "_code": "GUA-551-QY7",
                                "created_at": "2018-06-14 16:59:34",
                                "updated_at": "2018-06-14 17:16:56",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 1226,
                                "matricula": "21219",
                                "name": "Victor David Sunun monzon",
                                "email": "victordavid690@gmail.com",
                                "telefono": "55165389",
                                "nickname": "Vic690",
                                "_code": "GUA-537-Mws",
                                "created_at": "2018-06-14 18:03:57",
                                "updated_at": "2018-06-14 18:03:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1227,
                                "matricula": "5492",
                                "name": "BRIZUELA LAURENCE ALBERTO",
                                "email": "lbrizuela@me.com",
                                "telefono": "79282952",
                                "nickname": "lbrizuela",
                                "_code": "SAL-243-uNr",
                                "created_at": "2018-06-14 18:04:11",
                                "updated_at": "2018-06-14 18:04:11",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1228,
                                "matricula": "3299",
                                "name": "POSADA JULIO ANTONIO",
                                "email": "chico_posada_33@icloud.com",
                                "telefono": "78829969",
                                "nickname": "JulioPosada",
                                "_code": "SAL-176-sGr",
                                "created_at": "2018-06-14 18:11:01",
                                "updated_at": "2018-07-10 07:49:50",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 1229,
                                "matricula": "18125",
                                "name": "CASTILLO AVILA VERA LUCIA",
                                "email": "veluk16@hotmail.com",
                                "telefono": "56904909",
                                "nickname": "Vera",
                                "_code": "GUA-925-X6B",
                                "created_at": "2018-06-14 18:11:32",
                                "updated_at": "2018-06-14 18:11:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1230,
                                "matricula": "13262",
                                "name": "Sylvia",
                                "email": "sylnavarromoya@gmail.com",
                                "telefono": "89959836",
                                "nickname": "Sylvia NM",
                                "_code": "COR-644-Sda",
                                "created_at": "2018-06-14 18:19:54",
                                "updated_at": "2018-06-14 18:19:54",
                                "puntos": 22
                            }
                        },
                        {
                            "user": {
                                "id": 1231,
                                "matricula": "11559",
                                "name": "AJANEL COYOY SELVIN EDILZAR",
                                "email": "ajanelmd@gmail.com",
                                "telefono": "57700931",
                                "nickname": "Selvinhio",
                                "_code": "GUA-070-IcB",
                                "created_at": "2018-06-14 18:26:44",
                                "updated_at": "2018-07-05 02:53:01",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1232,
                                "matricula": "2352",
                                "name": "VAZQUEZ CASTILLO LEONEL HERIBERTO",
                                "email": "leovas21@gmail.com",
                                "telefono": "55883370",
                                "nickname": "Leo",
                                "_code": "GUA-010-Kt8",
                                "created_at": "2018-06-14 18:32:40",
                                "updated_at": "2018-07-05 19:57:23",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1233,
                                "matricula": "5245",
                                "name": "Edwing Garcia",
                                "email": "egarciatoro72.eg@gmail.com",
                                "telefono": "50495149978",
                                "nickname": "Dr. Garcia",
                                "_code": "HON-275-ZkM",
                                "created_at": "2018-06-14 18:57:53",
                                "updated_at": "2018-06-14 18:57:53",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1234,
                                "matricula": "7429",
                                "name": "MENDOZA ZUNIGA ALEJANDRA GISSELL",
                                "email": "alegrisellmz@gmail.com",
                                "telefono": "50498906687",
                                "nickname": "Mateo9913",
                                "_code": "HON-686-KNV",
                                "created_at": "2018-06-14 19:06:38",
                                "updated_at": "2018-06-14 19:06:38",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1235,
                                "matricula": "18269",
                                "name": "Josselyn Mojica",
                                "email": "josselynmojica@gmail.com",
                                "telefono": "79235650",
                                "nickname": "Josselyn1991",
                                "_code": "SAL-979-aiU",
                                "created_at": "2018-06-14 19:09:45",
                                "updated_at": "2018-06-14 19:09:45",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1236,
                                "matricula": "12038",
                                "name": "Laura Cerdas Hernández",
                                "email": "laucerhe@hotmail.com",
                                "telefono": "88914783",
                                "nickname": "Lau",
                                "_code": "COR-608-vTq",
                                "created_at": "2018-06-14 19:09:49",
                                "updated_at": "2018-06-14 19:09:49",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1237,
                                "matricula": "7193",
                                "name": "MARIA JOSE LOPEZ",
                                "email": "majolopezg@yahoo.es",
                                "telefono": "99426292",
                                "nickname": "Majo",
                                "_code": "HON-787-8ag",
                                "created_at": "2018-06-14 19:11:02",
                                "updated_at": "2018-06-14 19:11:02",
                                "puntos": 38
                            }
                        },
                        {
                            "user": {
                                "id": 1238,
                                "matricula": "11501",
                                "name": "GARCIA BERNARD DANIEL HAROLDO",
                                "email": "drgarciabernard@yahoo.com",
                                "telefono": "50257409511",
                                "nickname": "Dan",
                                "_code": "GUA-815-uAA",
                                "created_at": "2018-06-14 19:17:37",
                                "updated_at": "2018-06-14 19:17:37",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1239,
                                "matricula": "6982",
                                "name": "KARLA PATRICIA BOQUIN PERALTA",
                                "email": "karlaboquin2014@hotmail.com",
                                "telefono": "99393058",
                                "nickname": "ARIANITA",
                                "_code": "HON-206-vk3",
                                "created_at": "2018-06-14 19:25:55",
                                "updated_at": "2018-06-14 19:25:55",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1240,
                                "matricula": "14168",
                                "name": "POROJ ABAC EMILIA ALBERTINA",
                                "email": "emilalberth@yahoo.es",
                                "telefono": "59616374, 54344858",
                                "nickname": "EMILIA POROJ",
                                "_code": "GUA-442-jCI",
                                "created_at": "2018-06-14 19:42:43",
                                "updated_at": "2018-06-14 19:42:43",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1241,
                                "matricula": "14233",
                                "name": "LACAYO OROZCO ELIZABETH",
                                "email": "elacayo324@yahoo.com",
                                "telefono": "47100333",
                                "nickname": "Elizabeth",
                                "_code": "GUA-819-RQ7",
                                "created_at": "2018-06-14 19:50:07",
                                "updated_at": "2018-06-14 19:50:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1242,
                                "matricula": "18307",
                                "name": "Christian Rosal",
                                "email": "cros3390@gmail.com",
                                "telefono": "35132906",
                                "nickname": "Cros123",
                                "_code": "GUA-523-oY3",
                                "created_at": "2018-06-14 19:57:35",
                                "updated_at": "2018-06-14 19:57:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1243,
                                "matricula": "111712",
                                "name": "Ingrid Giselle Velasquez Martinez",
                                "email": "ingridg.velasquezm@gmail.com",
                                "telefono": "94666422",
                                "nickname": "Ingrid",
                                "_code": "HON-225-jm1",
                                "created_at": "2018-06-14 20:07:06",
                                "updated_at": "2018-06-14 20:07:06",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 1244,
                                "matricula": "11444",
                                "name": "MORALES MERIDA HENRY ESTUARDO",
                                "email": "ginecohm@yahoo.com",
                                "telefono": "55175699",
                                "nickname": "Henry Morales",
                                "_code": "GUA-887-fsx",
                                "created_at": "2018-06-14 20:12:44",
                                "updated_at": "2018-06-14 20:12:44",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1245,
                                "matricula": "10750",
                                "name": "Delio Alpizar Vega",
                                "email": "medico@novapark-usc.com",
                                "telefono": "83451853",
                                "nickname": "Doc",
                                "_code": "COR-576-3qG",
                                "created_at": "2018-06-14 20:13:18",
                                "updated_at": "2018-06-14 20:13:18",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1246,
                                "matricula": "8017",
                                "name": "PLATA ESPINOZA JORGE ALBERTO",
                                "email": "jplatax@hotmail.com",
                                "telefono": "87937624",
                                "nickname": "Platax",
                                "_code": "HON-137-Smp",
                                "created_at": "2018-06-14 20:18:42",
                                "updated_at": "2018-06-14 20:18:42",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1247,
                                "matricula": "15552",
                                "name": "MARIA JOSE TRIQUEZ LOPEZ",
                                "email": "triquezmj@hotmail.com",
                                "telefono": "30672239",
                                "nickname": "MARIAJO",
                                "_code": "GUA-442-VeP",
                                "created_at": "2018-06-14 20:48:09",
                                "updated_at": "2018-06-14 20:48:09",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1248,
                                "matricula": "11973",
                                "name": "Angie Navarro Badilla",
                                "email": "angienb_19@hotmail.com",
                                "telefono": "89903765",
                                "nickname": "Angienb",
                                "_code": "COR-323-26e",
                                "created_at": "2018-06-14 21:01:07",
                                "updated_at": "2018-06-14 21:01:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1249,
                                "matricula": "9528",
                                "name": "BARRENO LOPEZ MARITZA ANNABELLA",
                                "email": "dramaritzabarreno@yahoo.com",
                                "telefono": "57094824",
                                "nickname": "Maritza",
                                "_code": "GUA-466-V78",
                                "created_at": "2018-06-14 21:15:02",
                                "updated_at": "2018-06-14 21:15:02",
                                "puntos": 33
                            }
                        },
                        {
                            "user": {
                                "id": 1250,
                                "matricula": "9712",
                                "name": "Tania Mora De La Paz",
                                "email": "delapazcuba@gmail.com",
                                "telefono": "88996155",
                                "nickname": "Tania",
                                "_code": "COR-048-h2Q",
                                "created_at": "2018-06-14 21:16:10",
                                "updated_at": "2018-06-14 21:16:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1251,
                                "matricula": "11143",
                                "name": "Ana",
                                "email": "melialdana12@gmail.com",
                                "telefono": "89460956",
                                "nickname": "Anaaldana",
                                "_code": "HON-222-x6i",
                                "created_at": "2018-06-14 21:27:45",
                                "updated_at": "2018-06-18 18:11:14",
                                "puntos": 24
                            }
                        },
                        {
                            "user": {
                                "id": 1252,
                                "matricula": "13053",
                                "name": "ROSADO GALINDO ALEJANDRA EMILETH",
                                "email": "alemir2003@hotmail.com",
                                "telefono": "30102865",
                                "nickname": "Mile",
                                "_code": "GUA-839-NCO",
                                "created_at": "2018-06-14 21:43:32",
                                "updated_at": "2018-06-14 21:43:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1253,
                                "matricula": "4824",
                                "name": "CASTELLANOS EDWIN",
                                "email": "ecastellanos97@yahoo.es",
                                "telefono": "99027028",
                                "nickname": "Ed",
                                "_code": "HON-504-HpQ",
                                "created_at": "2018-06-14 21:46:42",
                                "updated_at": "2018-06-14 21:46:42",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1254,
                                "matricula": "2004904458",
                                "name": "Sara maria murillo",
                                "email": "betanco.jose.a7x@gmail.com",
                                "telefono": "99043226",
                                "nickname": "Fher0325",
                                "_code": "HON-669-vh7",
                                "created_at": "2018-06-14 21:51:13",
                                "updated_at": "2018-06-14 21:51:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1255,
                                "matricula": "6517",
                                "name": "Yadira Uclés",
                                "email": "yadaucma@hotmail.com",
                                "telefono": "95111095",
                                "nickname": "yadaucma",
                                "_code": "HON-323-UUa",
                                "created_at": "2018-06-14 22:29:36",
                                "updated_at": "2018-06-14 22:29:36",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1256,
                                "matricula": "13397",
                                "name": "MUÑOZ DE LEON DANIELA IVETTE",
                                "email": "dradanielamunoz@gmail.com",
                                "telefono": "50250833592",
                                "nickname": "Dani Muñoz",
                                "_code": "GUA-882-gKv",
                                "created_at": "2018-06-14 22:35:19",
                                "updated_at": "2018-06-14 22:35:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1257,
                                "matricula": "7037",
                                "name": "BOGANTES HERNANDEZ PABLO",
                                "email": "dr.pablo.b.h@gmail.com",
                                "telefono": "24406632",
                                "nickname": "Dr.Pablo",
                                "_code": "COR-478-4z0",
                                "created_at": "2018-06-14 23:24:38",
                                "updated_at": "2018-06-14 23:24:38",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 1258,
                                "matricula": "7880",
                                "name": "RODRIGUEZ ELMER ALBERTO",
                                "email": "elmerodir123@gmail.com",
                                "telefono": "elmerodir123@gmail.com",
                                "nickname": "Rodriguez",
                                "_code": "SAL-102-wEW",
                                "created_at": "2018-06-14 23:36:09",
                                "updated_at": "2018-06-14 23:36:09",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1259,
                                "matricula": "10440",
                                "name": "RIVERA DE JOVEL CLAUDIA PATRICIA",
                                "email": "crev@hotmail.es",
                                "telefono": "71294617",
                                "nickname": "Claudia",
                                "_code": "SAL-611-h2t",
                                "created_at": "2018-06-14 23:53:10",
                                "updated_at": "2018-06-14 23:53:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1260,
                                "matricula": "18514",
                                "name": "Jorge Fernando Vendrell Cabrera",
                                "email": "jvendrellcabrera@gmail.com",
                                "telefono": "31298781",
                                "nickname": "George",
                                "_code": "GUA-693-30F",
                                "created_at": "2018-06-14 23:53:36",
                                "updated_at": "2018-06-26 17:30:36",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1261,
                                "matricula": "9237",
                                "name": "MIRANDA JIMENEZ LUIS DIEGO",
                                "email": "drmirandaorl@gmail.com",
                                "telefono": "50688327077",
                                "nickname": "drmiranda",
                                "_code": "COR-352-PwX",
                                "created_at": "2018-06-14 23:58:10",
                                "updated_at": "2018-06-14 23:58:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1262,
                                "matricula": "9377",
                                "name": "LOPEZ BERRIOS VANESSA",
                                "email": "vanessalopezberrios@gmail.com",
                                "telefono": "88424895",
                                "nickname": "VANESSA",
                                "_code": "COR-955-HvO",
                                "created_at": "2018-06-14 23:58:40",
                                "updated_at": "2018-06-14 23:58:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1263,
                                "matricula": "11708",
                                "name": "ESTRADA AGUILA DE CONSUEGRA ROSA ISABEL",
                                "email": "isaestrada@medicaespecializada.com",
                                "telefono": "79304345",
                                "nickname": "Isa",
                                "_code": "GUA-586-7c9",
                                "created_at": "2018-06-15 00:55:21",
                                "updated_at": "2018-06-15 00:55:21",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1264,
                                "matricula": "7154",
                                "name": "Kalia Ulate",
                                "email": "kalipatri@hotmail.com",
                                "telefono": "2100-7984",
                                "nickname": "Dra. Ulate",
                                "_code": "COR-303-DxK",
                                "created_at": "2018-06-15 01:23:48",
                                "updated_at": "2018-06-15 01:23:48",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1265,
                                "matricula": "5982",
                                "name": "BARRIOS ARRIOLA JOSE HAROLDO",
                                "email": "alexbnowell@hotmail.com",
                                "telefono": "48845987",
                                "nickname": "Derek",
                                "_code": "GUA-632-Sjh",
                                "created_at": "2018-06-15 01:37:47",
                                "updated_at": "2018-06-15 01:37:47",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1266,
                                "matricula": "4274",
                                "name": "CRUZ SALGADO MARIA ORBELINA",
                                "email": "ocruzsalgado@yahoo.es",
                                "telefono": "2605-3419",
                                "nickname": "Maria",
                                "_code": "SAL-803-S4h",
                                "created_at": "2018-06-15 02:16:04",
                                "updated_at": "2018-06-15 02:16:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1267,
                                "matricula": "1017",
                                "name": "HERRERA NICOLAS NAZAR",
                                "email": "nicolasnazarh@gmail.com",
                                "telefono": "2225-0028",
                                "nickname": "NICOLAS",
                                "_code": "HON-687-LN4",
                                "created_at": "2018-06-15 02:20:10",
                                "updated_at": "2018-06-15 02:20:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1268,
                                "matricula": "12288",
                                "name": "LOPEZ CONTRERAS CLARA MARIBEL",
                                "email": "cmcshalavmar@hotmail.com",
                                "telefono": "53242979",
                                "nickname": "Marpaz",
                                "_code": "GUA-889-OGQ",
                                "created_at": "2018-06-15 02:33:12",
                                "updated_at": "2018-06-15 02:33:12",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1269,
                                "matricula": "6702",
                                "name": "Carol Viquez Morera",
                                "email": "cocoferv@gmail.com",
                                "telefono": "89749215",
                                "nickname": "cocoferv",
                                "_code": "COR-275-NOM",
                                "created_at": "2018-06-15 03:04:35",
                                "updated_at": "2018-06-15 03:04:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1270,
                                "matricula": "5822",
                                "name": "Edgar René Pérez Robles",
                                "email": "eperezrobles@gmail.com",
                                "telefono": "52046268",
                                "nickname": "Canchito",
                                "_code": "GUA-139-1FG",
                                "created_at": "2018-06-15 03:47:48",
                                "updated_at": "2018-06-15 03:47:48",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1271,
                                "matricula": "12117",
                                "name": "Mario Alfonso Sánchez Rodas",
                                "email": "gabilanmd@gmail.com",
                                "telefono": "50258591201",
                                "nickname": "gabilan",
                                "_code": "GUA-198-2hB",
                                "created_at": "2018-06-15 03:59:19",
                                "updated_at": "2018-06-15 03:59:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1272,
                                "matricula": "167",
                                "name": "German puac",
                                "email": "josepuuuac@gmail.com",
                                "telefono": "47412064",
                                "nickname": "Germanp",
                                "_code": "GUA-167-Bnh",
                                "created_at": "2018-06-15 04:10:06",
                                "updated_at": "2018-06-15 04:10:06",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1273,
                                "matricula": "0",
                                "name": "Julio ernesto",
                                "email": "jecs_90@hotmail.com",
                                "telefono": "86761365",
                                "nickname": "carrion suarez",
                                "_code": "NIC-648-FhW",
                                "created_at": "2018-06-15 05:25:42",
                                "updated_at": "2018-06-15 05:38:44",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1274,
                                "matricula": "3077",
                                "name": "Tomas soriano",
                                "email": "sabonarola27@hotmail.com",
                                "telefono": "75045080",
                                "nickname": "Tomas27",
                                "_code": "SAL-012-H63",
                                "created_at": "2018-06-15 05:37:19",
                                "updated_at": "2018-06-15 05:37:19",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 1275,
                                "matricula": "11889",
                                "name": "Moisés Alejandro Buezo Escoto",
                                "email": "moisesabe@icloud.com",
                                "telefono": "+504 9610-7779",
                                "nickname": "moipa214",
                                "_code": "HON-273-FOz",
                                "created_at": "2018-06-15 05:41:57",
                                "updated_at": "2018-06-15 05:41:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1276,
                                "matricula": "19746",
                                "name": "Carlos Miguel Mendoza Estrada",
                                "email": "cmendozae69@gmail.com",
                                "telefono": "49560312",
                                "nickname": "Cmendoza",
                                "_code": "GUA-504-1P5",
                                "created_at": "2018-06-15 06:01:07",
                                "updated_at": "2018-06-15 06:30:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1277,
                                "matricula": "42198",
                                "name": "Maria Auxiliadora Gonzalez Lopez",
                                "email": "magl23@outlook.com",
                                "telefono": "83849403",
                                "nickname": "Dra.magl",
                                "_code": "NIC-678-WuG",
                                "created_at": "2018-06-15 07:32:25",
                                "updated_at": "2018-06-15 07:32:25",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1278,
                                "matricula": "8140",
                                "name": "Mauricio Marcelo Baquedano Moreno",
                                "email": "maumar83@yahoo.es",
                                "telefono": "96761849",
                                "nickname": "maumar",
                                "_code": "HON-727-ejA",
                                "created_at": "2018-06-15 07:40:22",
                                "updated_at": "2018-06-15 07:40:22",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1279,
                                "matricula": "6573",
                                "name": "Jose medardo lara peña",
                                "email": "medardolp2004@yahoo.es",
                                "telefono": "95001927",
                                "nickname": "Jm",
                                "_code": "HON-800-b5w",
                                "created_at": "2018-06-15 07:47:28",
                                "updated_at": "2018-06-15 07:47:28",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1280,
                                "matricula": "18892",
                                "name": "Alejandro José Federico Hernández Chacón",
                                "email": "alejofhernandez@gmail.com",
                                "telefono": "52022686",
                                "nickname": "alejofhernandez",
                                "_code": "GUA-982-f8m",
                                "created_at": "2018-06-15 08:32:56",
                                "updated_at": "2018-06-15 08:32:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1281,
                                "matricula": "8696",
                                "name": "Marco Fabricio Pleytez Chacon",
                                "email": "mafaplecha@hotmail.com",
                                "telefono": "31907023",
                                "nickname": "ramonycajal",
                                "_code": "HON-579-4UC",
                                "created_at": "2018-06-15 08:45:44",
                                "updated_at": "2018-06-15 08:45:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1282,
                                "matricula": "16487",
                                "name": "CAMAS CASTILLO MIRIAM GABRIELA",
                                "email": "midium26@hotmail.com",
                                "telefono": "42160176",
                                "nickname": "Midium26",
                                "_code": "GUA-938-DDN",
                                "created_at": "2018-06-15 09:27:22",
                                "updated_at": "2018-07-05 05:19:23",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1283,
                                "matricula": "5562",
                                "name": "SILVA  GARCIA NELSON FEDERICO",
                                "email": "jsilvabol@yahoo.com",
                                "telefono": "41515868",
                                "nickname": "DrFSilva",
                                "_code": "GUA-363-wkx",
                                "created_at": "2018-06-15 13:25:27",
                                "updated_at": "2018-06-15 13:25:27",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1284,
                                "matricula": "6706",
                                "name": "Daniel Eduardo Guevara Reyes",
                                "email": "danedugue@hotmail.com",
                                "telefono": "50499958159",
                                "nickname": "Ultra",
                                "_code": "HON-966-Lif",
                                "created_at": "2018-06-15 17:18:49",
                                "updated_at": "2018-06-15 17:18:49",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1285,
                                "matricula": "13305",
                                "name": "Juan Carlos Fuentes",
                                "email": "jcfo33@hotmail.com",
                                "telefono": "98991335",
                                "nickname": "Jc",
                                "_code": "HON-428-oiG",
                                "created_at": "2018-06-15 18:59:46",
                                "updated_at": "2018-06-15 18:59:46",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1286,
                                "matricula": "53118",
                                "name": "Mauricio Alberto Céspedes Luquez",
                                "email": "mauricioobligado@gmail.com",
                                "telefono": "88208459",
                                "nickname": "mau2018",
                                "_code": "nic-875-hio",
                                "created_at": "2018-06-15 19:13:41",
                                "updated_at": "2018-06-15 19:13:41",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1287,
                                "matricula": "13361",
                                "name": "Ambar keny Aguilar",
                                "email": "ambarkeny1981@gmail.com",
                                "telefono": "73186730",
                                "nickname": "Ambar",
                                "_code": "SAL-166-9LO",
                                "created_at": "2018-06-15 19:15:57",
                                "updated_at": "2018-06-15 19:15:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1288,
                                "matricula": "7827",
                                "name": "AGUILAR GRIJALBA OSCAR AGUILAR",
                                "email": "oradr@yahoo.com",
                                "telefono": "59192241",
                                "nickname": "oradr",
                                "_code": "GUA-504-T1h",
                                "created_at": "2018-06-15 19:59:32",
                                "updated_at": "2018-06-15 19:59:32",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1289,
                                "matricula": "5764",
                                "name": "Mastroeni Camacho Carla",
                                "email": "carlamastroeni@yahoo.com",
                                "telefono": "70105829",
                                "nickname": "Car",
                                "_code": "COR-004-GZa",
                                "created_at": "2018-06-15 20:18:23",
                                "updated_at": "2018-06-15 20:18:23",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1290,
                                "matricula": "6447",
                                "name": "Lizarme Ibanez Gisela Jessica",
                                "email": "gjlizarme@yahoo.com.mx",
                                "telefono": "83438032",
                                "nickname": "Giss",
                                "_code": "COR-374-CAp",
                                "created_at": "2018-06-15 22:46:10",
                                "updated_at": "2018-06-30 07:52:19",
                                "puntos": 26
                            }
                        },
                        {
                            "user": {
                                "id": 1291,
                                "matricula": "4706",
                                "name": "CORDON VASQUEZ JORGE MARIO",
                                "email": "centrodecolposcopia@gmail.com",
                                "telefono": "(502) 30439882",
                                "nickname": "Cordonjm",
                                "_code": "GUA-843-gro",
                                "created_at": "2018-06-15 22:49:56",
                                "updated_at": "2018-06-15 22:49:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1292,
                                "matricula": "14341",
                                "name": "MELARA CAROLINA",
                                "email": "melaracarolina9@gmail.com",
                                "telefono": "77494175",
                                "nickname": "Carolina",
                                "_code": "SAL-120-QyG",
                                "created_at": "2018-06-15 23:09:30",
                                "updated_at": "2018-06-15 23:09:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1293,
                                "matricula": "12050",
                                "name": "CUEVAS MORALES DENNIS",
                                "email": "dennisrcuevas@yahoo.com",
                                "telefono": "30025144",
                                "nickname": "Dey",
                                "_code": "GUA-747-ssU",
                                "created_at": "2018-06-15 23:44:01",
                                "updated_at": "2018-06-15 23:44:01",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 1294,
                                "matricula": "7300",
                                "name": "Sonia Maribel Orellana",
                                "email": "soniakiara@yahoo.com",
                                "telefono": "99283512",
                                "nickname": "Sonia Orellana",
                                "_code": "HON-871-IJo",
                                "created_at": "2018-06-15 23:57:39",
                                "updated_at": "2018-06-15 23:57:39",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1295,
                                "matricula": "17087",
                                "name": "CASTELLANOS GARZA HADASSHA",
                                "email": "hadassha22@hotmail.com",
                                "telefono": "3045-1642",
                                "nickname": "hascasgar",
                                "_code": "GUA-943-872",
                                "created_at": "2018-06-16 00:53:20",
                                "updated_at": "2018-06-16 00:53:20",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 1296,
                                "matricula": "3863",
                                "name": "Gil Ng Rolanda",
                                "email": "r_gil@hotmail.com",
                                "telefono": "83814177",
                                "nickname": "Rolanda",
                                "_code": "COR-157-yfO",
                                "created_at": "2018-06-16 01:00:00",
                                "updated_at": "2018-06-16 01:00:00",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1297,
                                "matricula": "16438",
                                "name": "Maria Rebeca Bautista",
                                "email": "mareba4@hotmail.com",
                                "telefono": "54822155",
                                "nickname": "mareba4",
                                "_code": "GUA-882-rDt",
                                "created_at": "2018-06-16 02:29:57",
                                "updated_at": "2018-06-16 02:29:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1298,
                                "matricula": "7860",
                                "name": "Jesús Alberto Fiallos",
                                "email": "dr.fiallos@gmail.com",
                                "telefono": "94633107",
                                "nickname": "Dr Fiallos",
                                "_code": "HON-589-IfP",
                                "created_at": "2018-06-16 04:12:19",
                                "updated_at": "2018-06-16 04:12:19",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1299,
                                "matricula": "6824",
                                "name": "CHOTO CAMPOS RODOLFO ENRIQUE",
                                "email": "chotillo77@hotmail.com",
                                "telefono": "71801886",
                                "nickname": "Roencho",
                                "_code": "SAL-353-SmN",
                                "created_at": "2018-06-16 04:55:24",
                                "updated_at": "2018-06-16 04:55:24",
                                "puntos": 19
                            }
                        },
                        {
                            "user": {
                                "id": 1300,
                                "matricula": "14705",
                                "name": "ABARCA GUEVARA DELMY ARACELY",
                                "email": "aracelyabarca2@gmail.com",
                                "telefono": "71650565",
                                "nickname": "Aracely",
                                "_code": "SAL-760-s0x",
                                "created_at": "2018-06-16 07:22:44",
                                "updated_at": "2018-06-16 07:22:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1301,
                                "matricula": "16521",
                                "name": "CHANG MAURICIO",
                                "email": "mauriciochiang@gmail.com",
                                "telefono": "58966394",
                                "nickname": "mauchiang",
                                "_code": "gua-989-ps7",
                                "created_at": "2018-06-16 07:22:52",
                                "updated_at": "2018-06-16 07:22:52",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1302,
                                "matricula": "17824",
                                "name": "Denis Espinoza",
                                "email": "fiertigre@yahoo.com",
                                "telefono": "85966169",
                                "nickname": "NIC-389-Qpi",
                                "_code": "NIC-389-Qpi",
                                "created_at": "2018-06-16 17:39:11",
                                "updated_at": "2018-06-16 17:49:07",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1303,
                                "matricula": "10397",
                                "name": "Carolina Quesada Alvarez",
                                "email": "karitoqa@gmail.com",
                                "telefono": "89973147",
                                "nickname": "Carito",
                                "_code": "COR-725-d9I",
                                "created_at": "2018-06-16 18:08:40",
                                "updated_at": "2018-06-16 18:08:40",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1304,
                                "matricula": "9101",
                                "name": "Carolina Orellana",
                                "email": "oscargo0711@gmail.com",
                                "telefono": "59586503",
                                "nickname": "Wicho",
                                "_code": "GUA-854-n6N",
                                "created_at": "2018-06-16 18:58:34",
                                "updated_at": "2018-06-16 18:58:34",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1305,
                                "matricula": "4937",
                                "name": "FUNES CARDOZA CARLOS JAVIER",
                                "email": "cjfunez@hotmail.com",
                                "telefono": "98908495",
                                "nickname": "CJFunez",
                                "_code": "HON-535-wOW",
                                "created_at": "2018-06-16 23:41:54",
                                "updated_at": "2018-06-16 23:41:54",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1306,
                                "matricula": "10558",
                                "name": "MAAZ RODRIGUEZ JOSE ALEXANDER",
                                "email": "josejaviermaaz@gmail.com",
                                "telefono": "59457162",
                                "nickname": "Jose y Alex",
                                "_code": "GUA-399-6GG",
                                "created_at": "2018-06-17 00:25:05",
                                "updated_at": "2018-06-17 00:25:05",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1307,
                                "matricula": "20266",
                                "name": "Jacobo Tabora",
                                "email": "jacoboatabora@gmail.com",
                                "telefono": "30909487",
                                "nickname": "JacoboTabora",
                                "_code": "GUA-474-OHS",
                                "created_at": "2018-06-17 01:22:49",
                                "updated_at": "2018-06-17 01:22:49",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1308,
                                "matricula": "17878",
                                "name": "DIAZ TALAVERA GUILLERMO JOSE",
                                "email": "guidz18@gmail.com",
                                "telefono": "82407420",
                                "nickname": "guidz18",
                                "_code": "NIC-374-qhx",
                                "created_at": "2018-06-17 01:34:27",
                                "updated_at": "2018-06-17 01:34:27",
                                "puntos": 22
                            }
                        },
                        {
                            "user": {
                                "id": 1309,
                                "matricula": "0",
                                "name": "NO NAME - NEW USER",
                                "email": "neyva86@yahoo.es",
                                "telefono": "87526536",
                                "nickname": "Neyva",
                                "_code": "NIC-607-Eun",
                                "created_at": "2018-06-17 17:12:17",
                                "updated_at": "2018-06-17 17:12:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1310,
                                "matricula": "6950",
                                "name": "ZEPEDA CRUZ EDDY RAMON",
                                "email": "eddyzepedareyes@hotmail.com",
                                "telefono": "86712181",
                                "nickname": "EddyZerey",
                                "_code": "NIC-515-bv9",
                                "created_at": "2018-06-17 21:07:11",
                                "updated_at": "2018-06-17 21:07:11",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1311,
                                "matricula": "12929",
                                "name": "Mariana Josee Espinal Lopez",
                                "email": "caldevila@gmail.com",
                                "telefono": "32325035",
                                "nickname": "Nana",
                                "_code": "HON-652-8s5",
                                "created_at": "2018-06-17 23:47:00",
                                "updated_at": "2018-06-17 23:47:00",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1312,
                                "matricula": "6684",
                                "name": "AGUILAR MENDOZA RAXA IXCHEL",
                                "email": "raxaguilar@gmail.com",
                                "telefono": "97752201",
                                "nickname": "Dra Aguilar",
                                "_code": "HON-727-KBe",
                                "created_at": "2018-06-17 23:53:08",
                                "updated_at": "2018-06-17 23:53:08",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1313,
                                "matricula": "3865",
                                "name": "ORTIZ CABRERA EDGAR FERNANDO",
                                "email": "edgartrigreortiz@live.com",
                                "telefono": "42149434",
                                "nickname": "Edgartigre",
                                "_code": "GUA-367-sPY",
                                "created_at": "2018-06-18 00:10:20",
                                "updated_at": "2018-06-18 00:10:20",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1314,
                                "matricula": "7893",
                                "name": "Ana Rivas",
                                "email": "ana_mrivas@hotmail.com",
                                "telefono": "95671576",
                                "nickname": "Ana",
                                "_code": "HON-948-aqj",
                                "created_at": "2018-06-18 02:00:44",
                                "updated_at": "2018-06-18 02:00:44",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1315,
                                "matricula": "7629",
                                "name": "RODRIGUEZ MORALES FRANCISCO LUIS",
                                "email": "rodriguezperinatologo@gmail.com",
                                "telefono": "88849210",
                                "nickname": "Franco",
                                "_code": "NIC-276-vrn",
                                "created_at": "2018-06-18 05:16:08",
                                "updated_at": "2018-06-18 05:16:08",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1316,
                                "matricula": "12208",
                                "name": "VALLADARES RAMOS MARIA JOSE",
                                "email": "mjvr91@outlook.com",
                                "telefono": "96332071",
                                "nickname": "MJ",
                                "_code": "HON-144-M5O",
                                "created_at": "2018-06-18 07:19:45",
                                "updated_at": "2018-06-29 05:02:31",
                                "puntos": 20
                            }
                        },
                        {
                            "user": {
                                "id": 1317,
                                "matricula": "17492",
                                "name": "GONZALES LINARES MARIANA JUDITH",
                                "email": "happy3_petunita@hotmail.com",
                                "telefono": "74682201",
                                "nickname": "Mariana",
                                "_code": "Sal-206-way",
                                "created_at": "2018-06-18 09:22:04",
                                "updated_at": "2018-06-18 09:22:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1318,
                                "matricula": "1204944280",
                                "name": "Oscar Palma",
                                "email": "oscarpalma1987@gmail.com",
                                "telefono": "94506663",
                                "nickname": "OP2018",
                                "_code": "HON-291-PZf",
                                "created_at": "2018-06-18 19:44:37",
                                "updated_at": "2018-06-18 19:44:37",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1319,
                                "matricula": "2536",
                                "name": "CORTEZ LIMA ZOA VERONICA",
                                "email": "jm.c2@hotmail.com",
                                "telefono": "2232-0312",
                                "nickname": "Zoa",
                                "_code": "SAL-007-rYm",
                                "created_at": "2018-06-18 20:35:03",
                                "updated_at": "2018-06-18 20:35:03",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1320,
                                "matricula": "8462",
                                "name": "Alessa ismenia valeriano martinez",
                                "email": "valemar2015@gmail.com",
                                "telefono": "96226390",
                                "nickname": "Alessa valeriano",
                                "_code": "HON-099-4pD",
                                "created_at": "2018-06-19 01:03:25",
                                "updated_at": "2018-06-19 01:38:14",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1321,
                                "matricula": "10359",
                                "name": "Andrea Peña Ramirez",
                                "email": "ampr2522@gmail.com",
                                "telefono": "88492808",
                                "nickname": "Mely2225",
                                "_code": "COR-621-kkL",
                                "created_at": "2018-06-19 01:11:09",
                                "updated_at": "2018-06-19 01:11:09",
                                "puntos": 18
                            }
                        },
                        {
                            "user": {
                                "id": 1322,
                                "matricula": "3620",
                                "name": "WAIMIN R MARIO ROBERTO",
                                "email": "mwaimin@hotmail.com",
                                "telefono": "99909828",
                                "nickname": "Menkar",
                                "_code": "HON-232-BZN",
                                "created_at": "2018-06-19 01:36:52",
                                "updated_at": "2018-06-19 01:36:52",
                                "puntos": 8
                            }
                        },
                        {
                            "user": {
                                "id": 1323,
                                "matricula": "19278",
                                "name": "Keysy Antonio Arevalo Bonilla",
                                "email": "keysy2000@hotmail.com",
                                "telefono": "86342058",
                                "nickname": "KC78",
                                "_code": "NIC-091-9X8",
                                "created_at": "2018-06-19 03:10:15",
                                "updated_at": "2018-06-19 03:10:15",
                                "puntos": 14
                            }
                        },
                        {
                            "user": {
                                "id": 1324,
                                "matricula": "14119",
                                "name": "Fabiola",
                                "email": "faby_gc@msn.com",
                                "telefono": "88187801",
                                "nickname": "Faby",
                                "_code": "COR-689-uhQ",
                                "created_at": "2018-06-19 03:44:30",
                                "updated_at": "2018-06-19 03:44:30",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1325,
                                "matricula": "12643",
                                "name": "CONTRERAS LEON LUIS DONALDO",
                                "email": "luispediatra@yahoo.com.gt",
                                "telefono": "4149666",
                                "nickname": "luis contreras",
                                "_code": "GUA-879-Sqo",
                                "created_at": "2018-06-19 06:03:42",
                                "updated_at": "2018-06-19 06:03:42",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1326,
                                "matricula": "13060",
                                "name": "Juan Carlos Izco",
                                "email": "juanizcoa@hotmail.com",
                                "telefono": "31790544",
                                "nickname": "Juank",
                                "_code": "HON-853-i9k",
                                "created_at": "2018-06-19 19:46:10",
                                "updated_at": "2018-06-19 19:46:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1327,
                                "matricula": "13479",
                                "name": "MENDINUETA  FIGAROLA   ERNESTO",
                                "email": "ernymendinueta@yahoo.es",
                                "telefono": "56993818",
                                "nickname": "Erny Mendinueta",
                                "_code": "GUA-143-HTd",
                                "created_at": "2018-06-20 01:29:07",
                                "updated_at": "2018-06-20 01:29:07",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1328,
                                "matricula": "7733",
                                "name": "URBINA GUTIERREZ LESLIE AGNES",
                                "email": "leslieurbina66@yahoo.com.mx",
                                "telefono": "88503606",
                                "nickname": "leslieurbina66",
                                "_code": "nic-662-juo",
                                "created_at": "2018-06-20 03:08:13",
                                "updated_at": "2018-06-20 03:08:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1329,
                                "matricula": "2698",
                                "name": "ARIAS VARGAS JOAQUIN BERNARDO",
                                "email": "drarias@medicos.cr",
                                "telefono": "85454895",
                                "nickname": "drarias",
                                "_code": "COR-071-gBh",
                                "created_at": "2018-06-20 03:39:15",
                                "updated_at": "2018-06-20 03:39:15",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 1330,
                                "matricula": "21310",
                                "name": "Rosario Abigail Malin Morán",
                                "email": "abymalin02@gmail.com",
                                "telefono": "30047242",
                                "nickname": "abymalin",
                                "_code": "GUA-147-NBE",
                                "created_at": "2018-06-20 04:59:56",
                                "updated_at": "2018-06-20 04:59:56",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1331,
                                "matricula": "7550",
                                "name": "SAAVEDRA ZAAHDIA",
                                "email": "zahdita@hotmail.com",
                                "telefono": "98214843",
                                "nickname": "Zah",
                                "_code": "HON-705-uns",
                                "created_at": "2018-06-20 17:12:49",
                                "updated_at": "2018-06-20 17:12:49",
                                "puntos": 20
                            }
                        },
                        {
                            "user": {
                                "id": 1332,
                                "matricula": "7619",
                                "name": "DUARTE B. EDGAR FEDERICO",
                                "email": "edgar_duarte81@hotmail.com",
                                "telefono": "98989101",
                                "nickname": "Edgarduarte",
                                "_code": "HON-612-hMa",
                                "created_at": "2018-06-20 18:33:00",
                                "updated_at": "2018-06-20 18:33:00",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1333,
                                "matricula": "7528",
                                "name": "Danny Alejandro Rubio Cole",
                                "email": "dannyalejandro796@gmail.com",
                                "telefono": "32407861",
                                "nickname": "Alejandro796",
                                "_code": "HON-849-rt0",
                                "created_at": "2018-06-21 01:06:36",
                                "updated_at": "2018-06-21 01:06:36",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1334,
                                "matricula": "12063",
                                "name": "MUÑOZ CASTILLO LUCIA CAROLINA",
                                "email": "lcm74@yahoo.com",
                                "telefono": "88628997",
                                "nickname": "Lucia Muñoz",
                                "_code": "NIC-878-uu7",
                                "created_at": "2018-06-21 02:16:58",
                                "updated_at": "2018-06-21 02:16:58",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1335,
                                "matricula": "1",
                                "name": "Roger Caceres",
                                "email": "shagadragonlayer@gmail.com",
                                "telefono": "86792813",
                                "nickname": "Roger_Ivan",
                                "_code": "NIC-479-sB2",
                                "created_at": "2018-06-21 06:14:10",
                                "updated_at": "2018-06-21 06:14:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1336,
                                "matricula": "24638",
                                "name": "Fernando Pérez Espinoza",
                                "email": "fperezespinoza@yahoo.com",
                                "telefono": "83660018",
                                "nickname": "fperez",
                                "_code": "NIC-893-KjB",
                                "created_at": "2018-06-21 06:25:02",
                                "updated_at": "2018-06-21 06:25:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1337,
                                "matricula": "7509",
                                "name": "Vega Gutierrez Hector",
                                "email": "vega@medicos.cr",
                                "telefono": "50688863186",
                                "nickname": "Drhvg",
                                "_code": "COR-295-N7h",
                                "created_at": "2018-06-21 16:58:01",
                                "updated_at": "2018-06-21 16:58:01",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1338,
                                "matricula": "11908",
                                "name": "Diana",
                                "email": "dianalht27@gmail.com",
                                "telefono": "95401779",
                                "nickname": "Diana",
                                "_code": "HON-581-aLE",
                                "created_at": "2018-06-21 17:35:04",
                                "updated_at": "2018-06-21 17:35:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1339,
                                "matricula": "9454",
                                "name": "Urania Acedo Chiong",
                                "email": "urania.ac@gmail.com",
                                "telefono": "70148997",
                                "nickname": "Urania",
                                "_code": "COR-543-dTm",
                                "created_at": "2018-06-21 18:56:34",
                                "updated_at": "2018-06-29 06:44:14",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1340,
                                "matricula": "1994",
                                "name": "DE LA ROSA SANCHEZ JUAN FRANCISCO",
                                "email": "clinicavante@gmail.com",
                                "telefono": "23800101",
                                "nickname": "clinicavante@gmail.com",
                                "_code": "GUA-597-lwT",
                                "created_at": "2018-06-21 21:08:45",
                                "updated_at": "2018-06-21 21:08:45",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 1341,
                                "matricula": "12654",
                                "name": "MOIR ALVARADO ANGELICA LORENA",
                                "email": "pablofuentes0305@gmail.com",
                                "telefono": "35152132",
                                "nickname": "Lorena30",
                                "_code": "GUA-577-ALX",
                                "created_at": "2018-06-21 22:13:45",
                                "updated_at": "2018-06-21 22:13:45",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1342,
                                "matricula": "2309923675",
                                "name": "Ali Vega",
                                "email": "ilavega2000@yahoo.com",
                                "telefono": "99221135",
                                "nickname": "Ali",
                                "_code": "HON-401-wvZ",
                                "created_at": "2018-06-22 04:57:35",
                                "updated_at": "2018-06-22 04:57:35",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1343,
                                "matricula": "877",
                                "name": "Gabriel",
                                "email": "ygabrielomar@gmail.com",
                                "telefono": "94946761",
                                "nickname": "Argabri21",
                                "_code": "HON-877-Ejp",
                                "created_at": "2018-06-22 09:20:31",
                                "updated_at": "2018-06-22 09:20:31",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1344,
                                "matricula": "1994",
                                "name": "DE LA ROSA SANCHEZ JUAN FRANCISCO",
                                "email": "marianidecas@gmail.com",
                                "telefono": "23800101",
                                "nickname": "clinicavante@gmail.com",
                                "_code": "GUA-038-ugn",
                                "created_at": "2018-06-22 19:33:57",
                                "updated_at": "2018-06-22 19:33:57",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1345,
                                "matricula": "9213",
                                "name": "PELAEZ ORDOÑEZ OTTO RENE",
                                "email": "otto_repe@hotmail.com",
                                "telefono": "55133580     24404267",
                                "nickname": "OTTO",
                                "_code": "GUA-673-Zm1",
                                "created_at": "2018-06-22 22:05:34",
                                "updated_at": "2018-06-22 22:05:34",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1346,
                                "matricula": "8336",
                                "name": "JIMENEZ DILWORTH ANA JACKELINE",
                                "email": "a_jimenez@yahoo.com",
                                "telefono": "33986613",
                                "nickname": "Annie",
                                "_code": "HON-019-3QJ",
                                "created_at": "2018-06-23 18:56:36",
                                "updated_at": "2018-06-23 18:56:36",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1347,
                                "matricula": "4164",
                                "name": "MORALES BUSTAMANTE LUIS ARTURO",
                                "email": "etutor.luismorales@gmail.com",
                                "telefono": "55141179",
                                "nickname": "Pupo",
                                "_code": "Gua-827-st4",
                                "created_at": "2018-06-23 21:27:41",
                                "updated_at": "2018-06-23 21:27:41",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1348,
                                "matricula": "7470",
                                "name": "Axel Golfín Sevilla",
                                "email": "axelsevilla2392@gmail.com",
                                "telefono": "86073069",
                                "nickname": "axlGS",
                                "_code": "COR-232-kWu",
                                "created_at": "2018-06-23 22:14:02",
                                "updated_at": "2018-06-23 22:14:02",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1349,
                                "matricula": "10408",
                                "name": "Rolando chavez",
                                "email": "chavezyac29@gmail.com",
                                "telefono": "40734100",
                                "nickname": "Rolito chavez",
                                "_code": "GUA-144-krE",
                                "created_at": "2018-06-24 07:31:13",
                                "updated_at": "2018-06-24 07:31:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1350,
                                "matricula": "3861",
                                "name": "ALONZO ARAUJO OSCAR ROLANDO",
                                "email": "oscaralonzo78@gmail.com",
                                "telefono": "58071979",
                                "nickname": "Oscar",
                                "_code": "GUA-302-zGY",
                                "created_at": "2018-06-24 21:45:59",
                                "updated_at": "2018-06-24 21:45:59",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1351,
                                "matricula": "17857",
                                "name": "SAJ GONON LESLY MARITZA",
                                "email": "lesmar_86@hotmail.com",
                                "telefono": "42748463",
                                "nickname": "Maritza",
                                "_code": "GUA-216-An7",
                                "created_at": "2018-06-26 01:59:54",
                                "updated_at": "2018-06-26 01:59:54",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1352,
                                "matricula": "2380",
                                "name": "VARGAS RAMIREZ JOSE G.",
                                "email": "vargale@hotmail.com",
                                "telefono": "88576551",
                                "nickname": "Vargas",
                                "_code": "COR-127-Ftq",
                                "created_at": "2018-06-26 04:50:22",
                                "updated_at": "2018-06-26 04:50:22",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1353,
                                "matricula": "21496",
                                "name": "Lester Aleman",
                                "email": "lesam_aleman@hotmail.com",
                                "telefono": "50253497777",
                                "nickname": "Sam",
                                "_code": "Gua-096-mk4",
                                "created_at": "2018-06-26 10:52:20",
                                "updated_at": "2018-06-26 10:52:20",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1354,
                                "matricula": "1990",
                                "name": "GODOY OCHOA FRANCISCO JAVIER",
                                "email": "fjgochoa@gmail.com",
                                "telefono": "99981250",
                                "nickname": "Paco",
                                "_code": "HON-239-2lQ",
                                "created_at": "2018-06-27 01:27:59",
                                "updated_at": "2018-06-27 01:27:59",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1355,
                                "matricula": "5419",
                                "name": "Eunice Ramirez",
                                "email": "ners71@yahoo.com",
                                "telefono": "99799267",
                                "nickname": "EuniRami",
                                "_code": "HON-859-HUF",
                                "created_at": "2018-06-27 03:58:38",
                                "updated_at": "2018-06-27 03:58:38",
                                "puntos": 25
                            }
                        },
                        {
                            "user": {
                                "id": 1356,
                                "matricula": "504913346",
                                "name": "Carlos",
                                "email": "cvidesb@yahoo.com",
                                "telefono": "+504 99909614",
                                "nickname": "Cvides",
                                "_code": "HON-075-dv0",
                                "created_at": "2018-06-27 04:23:04",
                                "updated_at": "2018-06-27 04:23:04",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1357,
                                "matricula": "20079",
                                "name": "LUMBI CHAVARRIA IVETTE",
                                "email": "ivlumb@yahoo.es",
                                "telefono": "83801946",
                                "nickname": "Linda",
                                "_code": "NIC-243-mET",
                                "created_at": "2018-06-27 22:49:22",
                                "updated_at": "2018-06-27 22:49:22",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1358,
                                "matricula": "14090",
                                "name": "CEBALLOS FUENTES FERNANDO ALBERTO",
                                "email": "ceballosfuentes@hotmail.com",
                                "telefono": "55971331",
                                "nickname": "CienciaYArte",
                                "_code": "GUA-680-S1t",
                                "created_at": "2018-06-29 04:08:59",
                                "updated_at": "2018-06-29 04:08:59",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1359,
                                "matricula": "14321",
                                "name": "CATALAN GONZALES MARJORIE GRISSEL",
                                "email": "dracatalan.go@hotmail.com",
                                "telefono": "42201617",
                                "nickname": "Marge",
                                "_code": "GUA-937-htt",
                                "created_at": "2018-06-29 04:30:06",
                                "updated_at": "2018-06-29 04:30:06",
                                "puntos": 13
                            }
                        },
                        {
                            "user": {
                                "id": 1360,
                                "matricula": "51470",
                                "name": "Gustavo sequeira",
                                "email": "gustavo.sequeira@live.com",
                                "telefono": "75161975",
                                "nickname": "Gundstaff",
                                "_code": "NIC-598-jAB",
                                "created_at": "2018-06-29 04:34:30",
                                "updated_at": "2018-06-29 04:34:30",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1361,
                                "matricula": "11575",
                                "name": "Martha Muñoz",
                                "email": "marthamu_005@yahoo.com",
                                "telefono": "86138212",
                                "nickname": "Shua",
                                "_code": "NIC-990-v4l",
                                "created_at": "2018-06-29 05:28:53",
                                "updated_at": "2018-06-29 05:28:53",
                                "puntos": 17
                            }
                        },
                        {
                            "user": {
                                "id": 1362,
                                "matricula": "5288",
                                "name": "BERDUCIDO MORALES EDGAR ESTUARDO",
                                "email": "edgar.berducido@gmail.com",
                                "telefono": "58344679",
                                "nickname": "Edgarito",
                                "_code": "GUA-721-Uq8",
                                "created_at": "2018-06-29 06:31:46",
                                "updated_at": "2018-06-29 06:31:46",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1363,
                                "matricula": "19138",
                                "name": "VILLATORO MORAN CLARA",
                                "email": "clariboni@hotmail.com",
                                "telefono": "40652811",
                                "nickname": "Clarita",
                                "_code": "GUA-665-JMX",
                                "created_at": "2018-06-29 07:47:30",
                                "updated_at": "2018-06-29 07:47:30",
                                "puntos": 12
                            }
                        },
                        {
                            "user": {
                                "id": 1364,
                                "matricula": "50729",
                                "name": "Roberto Alas",
                                "email": "dralascarbajal@gmail.com",
                                "telefono": "85912372",
                                "nickname": "TitoAlas",
                                "_code": "NIC-352-2M2",
                                "created_at": "2018-06-29 20:09:10",
                                "updated_at": "2018-06-29 20:09:10",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1365,
                                "matricula": "11856",
                                "name": "ORIZABAL HIDALGO KAREN JULISSA",
                                "email": "karinorizabal@yahoo.com",
                                "telefono": "50199475",
                                "nickname": "Karincita",
                                "_code": "GUA-940-yGC",
                                "created_at": "2018-06-29 22:18:53",
                                "updated_at": "2018-06-29 22:18:53",
                                "puntos": 16
                            }
                        },
                        {
                            "user": {
                                "id": 1366,
                                "matricula": "9218",
                                "name": "Lopez Salgado Dennis Alberto",
                                "email": "dennislopez3@hotmail.com",
                                "telefono": "33604666",
                                "nickname": "Dennis Lopez",
                                "_code": "HON-003-iSA",
                                "created_at": "2018-06-30 00:53:31",
                                "updated_at": "2018-06-30 00:53:31",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1367,
                                "matricula": "9395",
                                "name": "TORRES ROLDAN OTTO RAUL",
                                "email": "drottotorres@yahoo.com",
                                "telefono": "502-54093067",
                                "nickname": "Torres",
                                "_code": "GUA-504-wxh",
                                "created_at": "2018-06-30 01:36:52",
                                "updated_at": "2018-06-30 01:36:52",
                                "puntos": 19
                            }
                        },
                        {
                            "user": {
                                "id": 1368,
                                "matricula": "1673",
                                "name": "Rene Estrada Mayorga",
                                "email": "drestradamayorga@gmail.com",
                                "telefono": "55177386",
                                "nickname": "Bucky",
                                "_code": "GUA-508-X3D",
                                "created_at": "2018-06-30 03:06:40",
                                "updated_at": "2018-06-30 03:06:40",
                                "puntos": 40
                            }
                        },
                        {
                            "user": {
                                "id": 1369,
                                "matricula": "5203",
                                "name": "BERMUDEZ URRUTIA CARMEN HERMINIA",
                                "email": "carmenhzhen@yahoo.com.mx",
                                "telefono": "22637918",
                                "nickname": "Carmen Herminia",
                                "_code": "SAL-221-ETs",
                                "created_at": "2018-06-30 04:42:49",
                                "updated_at": "2018-06-30 04:42:49",
                                "puntos": 13
                            }
                        },
                        {
                            "user": {
                                "id": 1370,
                                "matricula": "12288",
                                "name": "LOPEZ CONTRERAS CLARA MARIBEL",
                                "email": "shalav@hotmail.com",
                                "telefono": "53242979",
                                "nickname": "Mar de Paz",
                                "_code": "GUA-937-K0n",
                                "created_at": "2018-06-30 05:27:43",
                                "updated_at": "2018-06-30 05:27:43",
                                "puntos": 27
                            }
                        },
                        {
                            "user": {
                                "id": 1371,
                                "matricula": "12748",
                                "name": "Alma Nidia",
                                "email": "carrbaltodano12@gmail.com",
                                "telefono": "86798760",
                                "nickname": "hina",
                                "_code": "NIC-980-arx",
                                "created_at": "2018-06-30 06:19:32",
                                "updated_at": "2018-06-30 06:19:32",
                                "puntos": 23
                            }
                        },
                        {
                            "user": {
                                "id": 1372,
                                "matricula": "4534",
                                "name": "Leslie Naidia Figueroa Figueroa",
                                "email": "alessandrodanielff@gmail.com",
                                "telefono": "33244774",
                                "nickname": "SASO",
                                "_code": "HON-996-yXi",
                                "created_at": "2018-06-30 07:10:26",
                                "updated_at": "2018-06-30 07:10:26",
                                "puntos": 21
                            }
                        },
                        {
                            "user": {
                                "id": 1373,
                                "matricula": "14823",
                                "name": "DIAZ GRANADOS OBED ALCIDES",
                                "email": "dr.diazgranados89@gmail.com",
                                "telefono": "71805429",
                                "nickname": "DiazPed",
                                "_code": "SAL-022-vm3",
                                "created_at": "2018-06-30 07:33:21",
                                "updated_at": "2018-06-30 07:33:21",
                                "puntos": 3
                            }
                        },
                        {
                            "user": {
                                "id": 1374,
                                "matricula": "2288",
                                "name": "AGUILAR FIGUEROA JOSE ERNESTO",
                                "email": "ernestoab10@gmail.com",
                                "telefono": "54828888",
                                "nickname": "ernestoaf",
                                "_code": "GUA-475-vcy",
                                "created_at": "2018-06-30 08:17:29",
                                "updated_at": "2018-06-30 08:17:29",
                                "puntos": 9
                            }
                        },
                        {
                            "user": {
                                "id": 1375,
                                "matricula": "2288",
                                "name": "AGUILAR FIGUEROA JOSE ERNESTO",
                                "email": "pacopicu@hotmail.com",
                                "telefono": "54828888",
                                "nickname": "ernestoaf",
                                "_code": "GUA-180-iZX",
                                "created_at": "2018-06-30 08:39:19",
                                "updated_at": "2018-06-30 08:39:19",
                                "puntos": 20
                            }
                        },
                        {
                            "user": {
                                "id": 1376,
                                "matricula": "5701",
                                "name": "MONROY ROMERO CARLOS BERNARDO",
                                "email": "cbmonroymd@gmail.com",
                                "telefono": "99481339",
                                "nickname": "Monroy",
                                "_code": "HON-647-Rgi",
                                "created_at": "2018-06-30 09:38:17",
                                "updated_at": "2018-06-30 09:38:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1377,
                                "matricula": "20774",
                                "name": "Claudia",
                                "email": "claudiagj_23@hotmail.com",
                                "telefono": "41874308",
                                "nickname": "Claudia",
                                "_code": "GUA-373-Owv",
                                "created_at": "2018-06-30 09:44:17",
                                "updated_at": "2018-06-30 09:44:17",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1378,
                                "matricula": "16605",
                                "name": "Luisa",
                                "email": "luisasalazar85@gmail.com",
                                "telefono": "45678999",
                                "nickname": "Lawicha",
                                "_code": "GUA-507-7cH",
                                "created_at": "2018-06-30 17:28:13",
                                "updated_at": "2018-06-30 17:28:13",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1379,
                                "matricula": "17049",
                                "name": "Angelica Veliz",
                                "email": "ansuvear@gmail.com",
                                "telefono": "30949051",
                                "nickname": "Sussy",
                                "_code": "GUA-044-qN9",
                                "created_at": "2018-06-30 18:19:22",
                                "updated_at": "2018-06-30 18:19:22",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1380,
                                "matricula": "17339",
                                "name": "Donald José Luna Salmerón",
                                "email": "drdojose35@gmail.com",
                                "telefono": "87680966",
                                "nickname": "drdojose",
                                "_code": "NIC-224-XSx",
                                "created_at": "2018-07-01 01:31:56",
                                "updated_at": "2018-07-01 01:31:56",
                                "puntos": 6
                            }
                        },
                        {
                            "user": {
                                "id": 1381,
                                "matricula": "6053",
                                "name": "MORALES ESTRADA OSCAR LEONEL",
                                "email": "oscarinternista@yahoo.es",
                                "telefono": "55116690",
                                "nickname": "Oscar",
                                "_code": "GUA-853-KXM",
                                "created_at": "2018-07-01 18:05:27",
                                "updated_at": "2018-07-01 18:05:27",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1382,
                                "matricula": "18374",
                                "name": "Josué David Chávez Estrada",
                                "email": "jdlabase@hotmail.com",
                                "telefono": "51365839",
                                "nickname": "Chávez",
                                "_code": "Gua-401-azh",
                                "created_at": "2018-07-04 05:05:56",
                                "updated_at": "2018-07-04 05:05:56",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1383,
                                "matricula": "5865",
                                "name": "SANTOS VASQUEZ JOSE ANGEL",
                                "email": "drjsantosv@yahoo.com",
                                "telefono": "502-49061010",
                                "nickname": "CHEPE",
                                "_code": "GUA-536-aOZ",
                                "created_at": "2018-07-05 04:34:17",
                                "updated_at": "2018-07-05 04:34:17",
                                "puntos": 11
                            }
                        },
                        {
                            "user": {
                                "id": 1384,
                                "matricula": "1234",
                                "name": "josely  rodriguez",
                                "email": "jrodriguez@medpharma.com.gt",
                                "telefono": "30334535",
                                "nickname": "joshy",
                                "_code": "GUA-411-7z9",
                                "created_at": "2018-07-05 17:51:13",
                                "updated_at": "2018-07-05 17:51:13",
                                "puntos": 15
                            }
                        },
                        {
                            "user": {
                                "id": 1385,
                                "matricula": "944",
                                "name": "Pedro",
                                "email": "rjose5587@hotmail.com",
                                "telefono": "52022713",
                                "nickname": "pedro",
                                "_code": "GUA-362-NqT",
                                "created_at": "2018-07-06 00:49:47",
                                "updated_at": "2018-07-06 00:49:47",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1386,
                                "matricula": "5436",
                                "name": "Teresa del Sagrario López de Villeda",
                                "email": "j.villeda111@gmail.com",
                                "telefono": "78417031",
                                "nickname": "tslopez",
                                "_code": "SAL-175-UzV",
                                "created_at": "2018-07-07 21:00:27",
                                "updated_at": "2018-07-07 21:00:27",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1387,
                                "matricula": "16440",
                                "name": "MARITZA MARIBEL ORTIZ CAMPOS",
                                "email": "maritza.ortiz56@gmail.com",
                                "telefono": "73963888",
                                "nickname": "dra juguetes",
                                "_code": "SAL-788-uWV",
                                "created_at": "2018-07-08 01:12:42",
                                "updated_at": "2018-07-08 01:12:42",
                                "puntos": 0
                            }
                        },
                        {
                            "user": {
                                "id": 1388,
                                "matricula": "123",
                                "name": "Eduardo Villatoro",
                                "email": "evillatoro@gmail.com",
                                "telefono": "12345678",
                                "nickname": "Vtoro",
                                "_code": "HON-850-PGS",
                                "created_at": "2018-07-10 01:33:26",
                                "updated_at": "2018-07-10 01:33:26",
                                "puntos": 0
                            }
                        }
                    ]
                }';
    }
*/

}
