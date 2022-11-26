<div bgcolor="#ecedf6">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" bgcolor="#0691ab">
        <tbody><tr><td>
                    <table width="550px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center" style="width:550px;margin:0 auto;max-width:550px">
                        <tbody><tr><td valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
                                        <tbody><tr><td>
                                                    <img src="{{asset($settings['logo']) }}" style="display:block;width: 120px;height: 120px;" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 502px; top: 169px;">
                                                        <div id=":p4" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="akn"><div class="aSK J-J5-Ji aYr"></div></div></div></div>
                                                </td></tr>
                                          
                                            <tr><td bgcolor="#ffffff" style="padding-top:40px;padding-right:35px;padding-bottom:40px;padding-left:35px">
                                                    <h1 style="font-family:'Open Sans',sans-serif;font-size:15px;font-weight:bold;color:#343436;margin-bottom:25px">{{$subject}}</h1>
                                                    <p style="font-family:'Open Sans',sans-serif;font-size:13px;font-weight:600;color:#999ea5;margin-bottom:65px">{!! $greeting !!} <br>{!! $message_send !!} </p>
                                                     @if(!empty($link))
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                       
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="border-radius:22px" bgcolor="#0691ab">
                                                                    <a href="{{$link}}" style="font-size:16px;font-family:'Open Sans',sans-serif;color:#ffffff;text-decoration:none;text-transform:uppercase;padding:11px 25px;display:inline-block" target="_blank">{{$link_name}}</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                       @endif
                                                </td></tr>
                                          

                                        </tbody></table>
                                </td></tr>
                            <tr><td valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#0691ab">
                                        <tbody><tr><td style="text-align:center;padding-top:35px;padding-left:35px;padding-right:35px">
                                                    <div style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#fff;margin-bottom:10px">CONFIDENTIALITY NOTICE:</div>
                                                    <div style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#fff;margin-bottom:10px">The contents of this email message and any attachments are intended solely for the addressee(s) and may contain confidential and/or privileged information and may be legally protected from disclosure. If you are not the intended recipient of this message or their agent, or if this message has been addressed to you in error, please immediately alert the sender by reply email and then delete this message and any attachments. If you are not the intended recipient, you are hereby notified that any use, dissemination, copying, or storage of this message or its attachments is strictly prohibited.</div>
                                                    <div style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#fff;margin-bottom:10px">This email registered as account in {{$settings['site_name']}}</div>
                                                    <div style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#fff;margin-bottom:10px">If you are not a registered user, ignore this letter. <a style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#fff">Unsubscribe</a></div>
                                                    <a href="{{url('/')}}" style="text-align:center;font-family:'Open Sans',sans-serif;font-size:11px;font-weight:600;color:#999ea5" target="_blank" >{{$settings['site_name']}}</a>
                                                </td></tr>
                                        </tbody></table>
                                </td></tr>
                        </tbody></table>
                </td></tr>
        </tbody></table>