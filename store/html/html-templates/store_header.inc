<!--BEGIN NON-SECURE HEADER-->

<TABLE WIDTH="100%">

 <TR>
  <TD ALIGN="CENTER">
   This header is located in /cgi-bin/store/html/html-templates/store_header.inc
  </TD>
 </TR>

 <TR>
  <TD ALIGN="CENTER">
  
    <!--BEGIN SEARCH BOX-->
    <FORM METHOD=POST ACTION=commerce.cgi>
    <INPUT TYPE="text" NAME="keywords" SIZE="25" MAXLENGTH="60">
    <INPUT TYPE="hidden" NAME="cart_id" VALUE="%%cart_id%%">
    <INPUT TYPE="submit" NAME="search_request_button" VALUE=" Search ">
    </FORM>
    <!--END SEARCH BOX-->

  </TD>
 </TR>

</TABLE>

<TABLE WIDTH="100%">
 <TR>
  <TD ALIGN="CENTER">
   
   <a href="http://www.cgi-resources.com/rate?02288">Rate this Script @ The CGI Resource Index</a>
   <br>
   <p>
   <b>Demo Store - Choose a Category Below</b><br>
   <a href="commerce.cgi?cart_id=%%cart_id%%">Home</a> | 
   <a href="commerce.cgi?product=ecommerce&cart_id=%%cart_id%%">E-Commerce</a> |
   <a href="commerce.cgi?product=web_design&cart_id=%%cart_id%%">Web Design</a> |
   <a href="commerce.cgi?product=perl_cgi&cart_id=%%cart_id%%">PERL/CGI</a> |
   <a href="commerce.cgi?product=affiliate&cart_id=%%cart_id%%">Affiliate Programs</a><BR>

  </TD>
 </TR>
</TABLE>

<!--END NON SECURE HEADER-->
