<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use Google\Cloud\Vision\V1\AnnotateFileRequest;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\ImageContext;
use Google\Cloud\Vision\V1\InputConfig;

class EXCController extends Controller
{

    const BASE_PATH_FILE = 'storage/data/';

    public function input($input_type) {

        return view('exercises.input', [
            'mode' => 'INPUT',
            'input_type' => $input_type
        ]);
    }

    public function process($input_type, Request $request) {
        // dd($request->all());
        $input = $request->all();
        $req_content = $input['exc_req_content'];

        $res_content = $this->chatgpt_api($req_content);

        return view('exercises.result', [
            'mode' => 'PROCESS',
            'input_type' => $input_type,
            'req_content' => $req_content,
            'res_content' => $res_content
        ]);
    }
    public function chatgpt_api($req_content) {
        // Call API ChatGPT https://ahmadrosid.com/blog/chatgpt-api-laravel
        $messages = [
            ['role' => 'user', 'content' => $req_content],
        ];
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]);
        return Arr::get($response, 'choices.0.message')['content'];
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'req_content' => ['required', 'image']
        ]);
    }
    public function store_file(Request $request) {
        // dd($request->file('req_content'));
        $path = $request->file('req_content')->store('public/data'); // storage/app/public/data
        return substr($path, strlen('public/data/'));
    }
    public function ocr_upload(Request $request) {
        // dd($request->all());
        $this->validator($request->all())->validate();
        $imageUrl = $this->store_file($request);

        $ocr_text = $this->ocr_api($imageUrl);

        return view('exercises.input', [
            'mode' => 'INPUT',
            'input_type' => 'camera',
            'ocr_text' => $ocr_text
        ]);
    }

    public function ocr_api($file_path) {
        // khởi tạo thư viện
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => json_decode(file_get_contents('credentials/key_ocr.json'), true)
        ]);

        // -------- detect file image --------
        $imgFile = file_get_contents(self::BASE_PATH_FILE.$file_path, true);
        $ocrImgResult = $imageAnnotator->documentTextDetection($imgFile);
        $annotationsImg = $ocrImgResult->getFullTextAnnotation();
        $textResultImg = $annotationsImg->getText();
        // -------- end detect file image --------

        // -------- detect file pdf --------
        // $pdfFile = file_get_contents('images/sample.pdf', true);

        // $context = new ImageContext();
        // $context->setLanguageHints(['it']);
        // $input_config = (new InputConfig())
        //     ->setMimeType('application/pdf')
        //     ->setContent($pdfFile);

        // $feature = (new Feature())->setType(Type::DOCUMENT_TEXT_DETECTION);
        // $file_request = new AnnotateFileRequest();
        // $file_request = $file_request->setInputConfig($input_config)
        //     ->setFeatures([$feature])
        //     ->setPages([1]);

        // $requests = [$file_request];
        // $result = $imageAnnotator->batchAnnotateFiles($requests);
        // $ocrPdfResult = $result->getResponses();
        // $offset = $ocrPdfResult->offsetGet(0);
        // $responses = $offset->getResponses();
        // $res = $responses[0];
        // $annotationsPdf = $res->getFullTextAnnotation();
        // $imageAnnotator->close();
        // $textResultPdf = $annotationsPdf->getText();
        // -------- end detect file pdf --------

        return $textResultImg;
    }
}
