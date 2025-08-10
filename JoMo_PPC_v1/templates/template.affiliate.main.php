<%include file="header.php"%>

<div height="20"> &nbsp</div>

<%include file="affiliate.menu.php"%>

<TABLE WIDTH="" ALIGN="CENTER" BORDER="0" CELLSPACING="0" CELLPADDING="1" BGCOLOR="#ffffff" background="">
        <TR>
          <TD ALIGN="CENTER" CLASS="clsText1"><H1>Welcome to The Affiliate Management</H1></TD>
        </TR>
        
</TABLE>

<TABLE WIDTH="225" ALIGN="CENTER" BORDER="0" CELLSPACING="0" CELLPADDING="1" BGCOLOR="#eeeeee" background="">
        <TR>
          <TD ALIGN="CENTER" CLASS="clsText1"><h2><b><u>Affiliate Info:</u></h2></TD>
        </TR>
		<TR>
          <TD ALIGN="left" CLASS="clsText1"><b>Name: <%$info.firstName%></TD>
        </TR>
        <TR>
          <TD ALIGN="left" CLASS="clsText1"><b>Your Account is <%if $account.isActive == 1%><font color="green">active</font><%else%><font color="red">not active</font><%/if%></TD>
        </TR>
		<TR>
          <TD ALIGN="left" CLASS="clsText1"><b>Your account balance: <font color="red">$<%$account.balance%></TD>
        </TR>
        
</TABLE>

<br>
<TABLE WIDTH="250" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="1" BGCOLOR="#FFFF99" background="" bordercolor="#FFCC00">
        <TR>
          <TD ALIGN="CENTER" ><h2>Operations:</h2></TD>
        </TR>
		<TR>
          <TD ALIGN="left" >
          	<UL>

<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=main">Main</a></b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=searchboxes">search boxes</a></b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=customize">customize search results</a></b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=xml">XML format</a>  </b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=info">Info</a>  </b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=account">Account</a></b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=clickstats">Statistics</a></b>
<li><b><a href="<%$selfURL%>?mode=affiliates&affMode=logout">Logout</a></b>

   
			</UL>
			</TD>
        </TR>
        
</TABLE>


<%include file="affiliate.footer.php"%>