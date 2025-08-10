<%include file="header.php"%>

<div height="20"> &nbsp</div>

<%include file="affiliate.menu.php"%>

<DIV ALIGN="CENTER">

<table border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="">
 <tr valign="top">
  <td align="center">
        <%$member.firstName%> <%$member.lastName%>.<br>
        Fill info to request money. Your request will be examined by admin in few days.<br>
        <%$msg%>
  </td>
 </tr>
</TABLE>

<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" >
<TR><TD VALIGN=TOP>
        <H3 ALIGN=CENTER>
                Request money.
        </H3>
</TD>
</TR>
</TABLE>



<script>
 function onFormSubmit(){
          return true;
 }
</script>

<form name="f" action="<%$selfURL%>" method="post" onsubmit="return onFormSubmit();">

        <input type="hidden" name = "mode" value="affiliates">
        <input type="hidden" name = "affMode" value="request">
        <input type="hidden" name = "cmd" value="request">
        <input type="hidden" name = "affiliateID" value="<%$member.affiliateID%>">


<table border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#E0E0E0">
<tr valign="top">
  <td align="right">
    payment:    
  </td>
  <td align="left">
    <input type="radio" name="paymentType" value="paypal" CHECKED>PayPal<br>
    <input type="radio" name="paymentType" value="check">check<br>
    <input type="radio" name="paymentType" value="other">other (please write your comments)<br>
  </td>
  
</tr>

<tr valign="top">
  <td align="right">
    additional information<br> and comments:    
  </td>
  <td align="left">
    <textarea name="comments" style="width:300;height:110;"></textarea>
  </td>
  
</tr>

<tr valign="top">
  <td align="center" colspan="2">
        <input type="button" name="request" value="request"
            onclick="document.forms['f'].submit();">
        <input type="button" name="back" value="back" onclick="history.go(-1);">
  </td>
</tr>

</table>


</form>

</DIV>

<%include file="affiliate.footer.php"%>