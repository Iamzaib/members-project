<!DOCTYPE html>
<html>
<head>
    <title>Welkom Email</title>
</head>
<body>
<h2>Welkom op de site, {{$member->first_name}} {{ $member->surname }}</h2>
<br/>
Uw geregistreerd email-id is {{$member->enamel}} , Klik op de onderstaande link om uw e-mailaccount te verifiëren
<br/><br/><br/>
<a href="{{route('member_verify_link', $member->verifyMember->token)}}" style="box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    position: relative;
    -webkit-text-size-adjust: none;
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    overflow: hidden;
    text-decoration: none;
    background-color: #2d3748;
    border-bottom: 8px solid #2d3748;
    border-left: 18px solid #2d3748;
    border-right: 18px solid #2d3748;
    border-top: 8px solid #2d3748">Verifieer uw Email</a>
</body>
</html>

