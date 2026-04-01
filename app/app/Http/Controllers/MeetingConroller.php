<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;


class MeetingConroller extends Controller
{
    /**
     * Display the user's profile form.
     */
    private static $apitoken = '8bygbC9P2JDeAId';

    public static function index(Request $request)
    {
        
        $name       = "User Admin";
        $meeting_id = 'Spark Olympiads Meeting At ' . date('d M Y') . ' ID ' . rand(100000, 999999);

        $postData = [
            "duration"      => "30",
            "logout_url"    => "https://sansoftwares.com",
            "banner_text"   => "Live Meeting 20",
            "welcome_text"  => $meeting_id,
            "logo_url"      => "https://sanmeet.sansoftwares.com/img/san_ZIXh3OvN3c_20250331162901.png",
            "auto_start"    => "yes",
            "enable_share_screen" => 1,
            "enable_webcam" => 1,
            "enable_mic"    => 1,
            "record"        => 1
        ];
        $url = 'https://sanmeet.sansoftwares.com/api/create_meeting';
        $response = self::curlfun($url,$postData);

        $decodedResponse = json_decode($response, true);
        if (!empty($decodedResponse['code'])) {
            if ($decodedResponse['code'] == 200) {
                if(!empty($decodedResponse['data'])){
                    $meetingurl = 'https://sanmeet.sansoftwares.com/api/join_meeting';
                    $meetingData['user_id']    = "34534535";
                    $meetingData['user_name']  = $name;
                    $meetingData['user_role']  = "VIEWER";
                    $meetingData['logout_url'] = "https://sansoftwares.com";
                    $meetingData['meeting_id'] = $decodedResponse['data']['meeting_id'];
                    $meeting_response = self::curlfun($meetingurl,$meetingData);
                    $decodedMeetingResponse = json_decode($meeting_response, true);
                    if(!empty($decodedMeetingResponse)){
                        if ($decodedMeetingResponse['code'] == 200 && $decodedMeetingResponse['success']) {
                            $video_url = $decodedMeetingResponse['data'];                         
                            return redirect()->route('school.dashboard')->with('video_url', $video_url);
                        }else{
                            return response()->json(['status'=>404,'message'=>$decodedMeetingResponse['message']]);
                        }
                    }else{
                        return response()->json(['status'=>404,'message'=>'Oops! Something went wrong.']);
                    }
                }else{
                    return response()->json(['status'=>404,'message'=>$decodedResponse['message']]);
                }
            }
        } else {
            return response()->json(['status'=>404,'message'=>'Oops! Something went wrong.']);
        }
    }

    public static function curlfun($url,$postData){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'api_token: '.self::$apitoken,
                'Content-Type: application/json',
                'Cookie: connect.sid=s%3ANMdOmkmUka3ohdYbf8fSRGouw_jNDZ4O.btWWuvzvJlgrRvNtFzD%2BST9LIvJGDuLXwgzS7H%2F9xZY'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}