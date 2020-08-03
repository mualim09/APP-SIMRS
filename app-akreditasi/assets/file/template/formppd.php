<?php 
date_default_timezone_set("Asia/Bangkok");
$datenow = date('d-m-Y h-i-s');
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=HASIL FORM PEMBUATAN/PERUBAHAN DOKUMEN-$datenow.doc");

include "include/connection.php";
include 'include/head.php';

$id_peru   = $_GET['id'];
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List href="formppd_files/filelist.xml">
<link rel=Edit-Time-Data href="formppd_files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Admin</o:Author>
  <o:LastAuthor>RS Ginjal</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>394</o:TotalTime>
  <o:LastPrinted>2019-05-21T03:20:00Z</o:LastPrinted>
  <o:Created>2020-07-02T06:46:00Z</o:Created>
  <o:LastSaved>2020-07-02T06:46:00Z</o:LastSaved>
  <o:Pages>3</o:Pages>
  <o:Words>160</o:Words>
  <o:Characters>914</o:Characters>
  <o:Lines>7</o:Lines>
  <o:Paragraphs>2</o:Paragraphs>
  <o:CharactersWithSpaces>1072</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:RelyOnVML/>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=themeData href="formppd_files/themedata.thmx">
<link rel=colorSchemeMapping href="formppd_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>5.5 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="376">
  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 9"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="header"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footer"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index heading"/>
  <w:LsdException Locked="false" Priority="35" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of figures"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope return"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="line number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="page number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of authorities"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="macro"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="toa heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 5"/>
  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Closing"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Signature"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="true"
   UnhideWhenUsed="true" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Message Header"/>
  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Salutation"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Date"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Note Heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Block Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="FollowedHyperlink"/>
  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Document Map"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Plain Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="E-mail Signature"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal (Web)"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Acronym"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Cite"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Code"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Definition"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Keyboard"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Preformatted"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Sample"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Typewriter"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Variable"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation subject"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="No List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Contemporary"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Elegant"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Professional"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Balloon Text"/>
  <w:LsdException Locked="false" Priority="59" Name="Table Grid"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Theme"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>
  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>
  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>
  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>
  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>
  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>
  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hashtag"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Unresolved Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Link"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1073732485 9 0 511 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-ansi-language:IN;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma",sans-serif;
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:609.55pt 935.55pt;
	margin:28.35pt 56.7pt 28.35pt 56.7pt;
	mso-header-margin:35.45pt;
	mso-footer-margin:35.45pt;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 @list l0
	{mso-list-id:29846737;
	mso-list-type:hybrid;
	mso-list-template-ids:-961103870 69271577 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l0:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l0:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l0:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l0:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l1
	{mso-list-id:128868683;
	mso-list-type:hybrid;
	mso-list-template-ids:-1516987730 -965866090 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l1:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l1:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l1:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l1:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l2
	{mso-list-id:288051774;
	mso-list-type:hybrid;
	mso-list-template-ids:-198526320 311468588 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l2:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l2:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l2:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l2:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l3
	{mso-list-id:936134870;
	mso-list-type:hybrid;
	mso-list-template-ids:1912355776 -1088670926 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l3:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l3:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l3:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l3:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4
	{mso-list-id:1346902953;
	mso-list-type:hybrid;
	mso-list-template-ids:1921386696 -2011121844 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l4:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l4:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l4:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5
	{mso-list-id:1711950440;
	mso-list-type:hybrid;
	mso-list-template-ids:1370659130 245392688 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l5:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l5:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l5:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l6
	{mso-list-id:1771974801;
	mso-list-type:hybrid;
	mso-list-template-ids:-1092062894 69271567 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l6:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l6:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l6:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l6:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l7
	{mso-list-id:1907375846;
	mso-list-type:hybrid;
	mso-list-template-ids:-1915301626 69271577 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l7:level1
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l7:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l7:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l7:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8
	{mso-list-id:2042783312;
	mso-list-type:hybrid;
	mso-list-template-ids:-2005651340 543577352 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l8:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;
	mso-ansi-font-size:11.0pt;}
@list l8:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l8:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l8:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9
	{mso-list-id:2092651510;
	mso-list-type:hybrid;
	mso-list-template-ids:1730044910 -1592073142 69271577 69271579 69271567 69271577 69271579 69271567 69271577 69271579;}
@list l9:level1
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level2
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level3
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9:level4
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level5
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level6
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
@list l9:level7
	{mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level8
	{mso-level-number-format:alpha-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-.25in;}
@list l9:level9
	{mso-level-number-format:roman-lower;
	mso-level-tab-stop:none;
	mso-level-number-position:right;
	text-indent:-9.0pt;}
ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:59;
	mso-style-unhide:no;
	border:solid black 1.0pt;
	mso-border-themecolor:text1;
	mso-border-alt:solid black .5pt;
	mso-border-themecolor:text1;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid black;
	mso-border-insideh-themecolor:text1;
	mso-border-insidev:.5pt solid black;
	mso-border-insidev-themecolor:text1;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:IN;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1030"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>
<?php
$con=mysqli_connect("localhost","root","","rskg_akreditasi");
    // Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM tb_ppd WHERE id_peru='$id_peru'");
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result))
    {
    ?>
<div class=WordSection1>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=699
 style='width:524.25pt;border-collapse:collapse;border:none;mso-border-alt:
 solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:34.9pt'>
  <td width=198 colspan=3 rowspan=3 valign=top style='width:148.6pt;border:
  solid black 1.0pt;mso-border-themecolor:text1;mso-border-alt:solid black .5pt;
  mso-border-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:0in;margin-left:0in;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span lang=IN style='font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'><v:shapetype id="_x0000_t75" coordsize="21600,21600" o:spt="75"
   o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="_x0000_i1026" type="#_x0000_t75" alt="logo.png"
   style='width:53.25pt;height:54pt;visibility:visible;mso-wrap-style:square'>
   <v:imagedata src="../../assets/images/header.png" o:title="logo"/>
  </v:shape></span><span lang=IN style='font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:"Times New Roman",serif'><o:p></o:p></span></p>
  <p class=MsoListParagraphCxSpFirst align=center style='margin-left:0in;
  mso-add-space:auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  lang=IN style='font-size:10.0pt;mso-ansi-language:IN'>RSKG<span
  style='mso-spacerun:yes'></span> NY.R.A. HABIBIE<o:p></o:p></span></b></p>
  <p class=MsoListParagraphCxSpLast align=center style='margin-left:0in;
  mso-add-space:auto;text-align:center'><span lang=IN style='font-size:8.0pt;
  mso-ansi-language:IN'>Jl. Tubagus Ismail No.46 <o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Times New Roman",serif'>Bandung . 40134<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Times New Roman",serif'>Telp. (022) 2501985 Fax. (022) 2501984</span><span
  lang=IN style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:"Times New Roman",serif'><o:p></o:p></span></p>
  </td>
  <td width=198 rowspan=3 style='width:148.85pt;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;border-left:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:0in;margin-left:0in;margin-bottom:.0001pt;text-align:center;
  line-height:150%'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
  font-family:"Times New Roman",serif'>FORM PEMBUATAN/ PERUBAHAN DOKUMEN</span></b><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
  <td width=76 valign=bottom style='width:56.7pt;border:none;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Pemohon<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=208 valign=bottom style='width:155.95pt;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;border-left:none;border-bottom:none;
  border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b><span style='font-family:"Times New Roman",serif;
  mso-ansi-language:EN-US'><?php echo $row['pemohon']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:35.05pt'>
  <td width=76 valign=bottom style='width:56.7pt;border:none;mso-border-left-alt:
  solid black .5pt;mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:35.05pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Bagian<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:35.05pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=208 valign=bottom style='width:155.95pt;border:none;border-right:
  solid windowtext 1.0pt;mso-border-right-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:35.05pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b><span style='font-family:"Times New Roman",serif;
  mso-ansi-language:EN-US'><?php echo $row['bagian']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:20.55pt'>
  <td width=76 valign=bottom style='width:56.7pt;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:20.55pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Tanggal<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;mso-border-bottom-alt:
  solid black .5pt;mso-border-bottom-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:20.55pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=208 valign=bottom style='width:155.95pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid windowtext 1.0pt;mso-border-bottom-alt:solid black .5pt;
  mso-border-bottom-themecolor:text1;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.55pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b><span style='font-family:"Times New Roman",serif;
  mso-ansi-language:EN-US'><?php echo $row['tanggal']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:22.7pt'>
  <td width=699 colspan=7 style='width:524.25pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:
  242;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  lang=IN style='font-family:"Times New Roman",serif;color:black;mso-color-alt:
  windowtext'>USULAN PEMBUATAN DOKUMEN</span></b><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;height:25.5pt'>
  <td width=170 valign=bottom style='width:127.35pt;border:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Dokumen*<i style='mso-bidi-font-style:
  normal'><o:p></o:p></i></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 valign=bottom style='width:382.75pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['pem_dokumen']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Judul<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['pem_judul']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>No. Dokumen<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['pem_no_dok']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;height:25.5pt'>
  <td width=170 style='width:127.35pt;border-top:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;
  border-right:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Tgl Mulai Berlaku<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['pem_tgl_berlaku']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8;height:22.7pt'>
  <td width=699 colspan=7 style='width:524.25pt;border-top:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;
  mso-border-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
  background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:
  242;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  lang=IN style='font-family:"Times New Roman",serif;color:black;mso-color-alt:
  windowtext'>USULAN PERUBAHAN DOKUMEN</span></b><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9;height:25.5pt'>
  <td width=170 valign=bottom style='width:127.35pt;border:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Dokumen<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 valign=bottom style='width:382.75pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-right-alt:
  solid black .5pt;mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['peru_dokumen']; ?></span><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Judul<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['peru_judul']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>No. Dokumen<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['peru_no_dok']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:12;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Tgl Mulai Berlaku<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['peru_tgl_berlaku']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:13;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Status Revisi<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['peru_status_revisi']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:15;height:25.5pt'>
  <td width=170 style='width:127.35pt;border-top:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;
  border-right:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Alasan Perubahan<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['peru_alasan']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:16;height:22.7pt'>
  <td width=699 colspan=7 style='width:524.25pt;border-top:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:windowtext;mso-border-left-alt:black;
  mso-border-left-themecolor:text1;mso-border-bottom-alt:windowtext;mso-border-right-alt:
  black;mso-border-right-themecolor:text1;mso-border-style-alt:solid;
  mso-border-width-alt:.5pt;background:#F2F2F2;mso-background-themecolor:background1;
  mso-background-themeshade:242;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
  lang=IN style='font-family:"Times New Roman",serif;color:black;mso-color-alt:
  windowtext'>USULAN PE-NON AKTIFAN (<i style='mso-bidi-font-style:normal'>OBSOLETE</i>)
  DOKUMEN</span></b><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:17;height:25.5pt'>
  <td width=170 valign=bottom style='width:127.35pt;border:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Dokumen<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.15pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 valign=bottom style='width:382.75pt;border:none;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-right-alt:
  solid black .5pt;mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['non_dokumen']; ?></span><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:18;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Judul<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['non_judul']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:19;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>No. Dokumen<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['non_no_dok']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:20;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Status Revisi<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['non_status_revisi']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:21;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Tgl. Dokumen Nonaktif<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['non_tgl']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:22;height:25.5pt'>
  <td width=170 style='width:127.35pt;border:none;border-left:solid black 1.0pt;
  mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'>Alasan Penonaktifan<o:p></o:p></span></b></p>
  </td>
  <td width=19 style='width:14.15pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></p>
  </td>
  <td width=510 colspan=5 style='width:382.75pt;border:none;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:25.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US;mso-fareast-language:IN;mso-no-proof:yes'><?php echo $row['non_alasan']; ?><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:23;height:28.35pt'>
  <td width=699 colspan=7 style='width:524.25pt;border-top:none;border-left:
  solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
  solid black .5pt;mso-border-left-themecolor:text1;mso-border-bottom-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:28.35pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif;mso-fareast-language:
  IN;mso-no-proof:yes'>* Coret yang tidak perlu</span><span style='font-family:
  "Times New Roman",serif;mso-ansi-language:EN-US;mso-fareast-language:IN;
  mso-no-proof:yes'><o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-family:"Times New Roman",serif;mso-fareast-language:
  IN;mso-no-proof:yes'>** Hanya diisi untuk SPO<b style='mso-bidi-font-weight:
  normal'><o:p></o:p></b></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:24;height:64.95pt'>
  <td width=699 colspan=7 valign=top style='width:524.25pt;border-top:none;
  border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:
  none;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:64.95pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><v:rect id="Rectangle_x0020_57"
   o:spid="_x0000_s1027" style='position:absolute;margin-left:-.5pt;
   margin-top:31.95pt;width:11.8pt;height:11.8pt;z-index:251662336;
   visibility:visible;mso-wrap-style:square;mso-width-percent:0;
   mso-height-percent:0;mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
   mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
   mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
   mso-position-vertical:absolute;mso-position-vertical-relative:text;
   mso-width-percent:0;mso-height-percent:0;mso-width-relative:margin;
   mso-height-relative:margin;v-text-anchor:middle' o:gfxdata="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
APMAAADpBQAAAAA=
" fillcolor="white [3212]" strokecolor="black [3213]" strokeweight="1pt"/><v:shapetype
   id="_x0000_t202" coordsize="21600,21600" o:spt="202" path="m,l,21600r21600,l21600,xe">
   <v:stroke joinstyle="miter"/>
   <v:path gradientshapeok="t" o:connecttype="rect"/>
  </v:shapetype><v:shape id="Text_x0020_Box_x0020_58" o:spid="_x0000_s1026"
   type="#_x0000_t202" style='position:absolute;margin-left:14pt;margin-top:28.8pt;
   width:83.15pt;height:20.4pt;z-index:251663360;visibility:visible;
   mso-wrap-style:none;mso-width-percent:0;mso-height-percent:0;
   mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
   mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
   mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
   mso-position-vertical:absolute;mso-position-vertical-relative:text;
   mso-width-percent:0;mso-height-percent:0;mso-width-relative:margin;
   mso-height-relative:margin;v-text-anchor:top' o:gfxdata="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
AAAEAAQA8wAAAO4FAAAAAA==
" fillcolor="white [3201]" stroked="f" strokeweight=".5pt">
   <v:textbox>
    <![if !mso]>
    <table cellpadding=0 cellspacing=0 width="100%">
     <tr>
      <td><![endif]>
      <div>
      <p class=MsoNormal><span lang=IN style='font-family:"Times New Roman",serif'>Tidak
      Disetujui<o:p></o:p></span></p>
      </div>
      <![if !mso]></td>
     </tr>
    </table>
    <![endif]></v:textbox>
  </v:shape><v:shape id="Text_x0020_Box_x0020_41" o:spid="_x0000_s1029" type="#_x0000_t202"
   style='position:absolute;margin-left:14pt;margin-top:7.35pt;width:54.75pt;
   height:20.4pt;z-index:251660288;visibility:visible;mso-wrap-style:none;
   mso-width-percent:0;mso-height-percent:0;mso-wrap-distance-left:9pt;
   mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;
   mso-wrap-distance-bottom:0;mso-position-horizontal:absolute;
   mso-position-horizontal-relative:text;mso-position-vertical:absolute;
   mso-position-vertical-relative:text;mso-width-percent:0;
   mso-height-percent:0;mso-width-relative:margin;mso-height-relative:margin;
   v-text-anchor:top' o:gfxdata="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
BAAEAPMAAADsBQAAAAA=
" fillcolor="white [3201]" stroked="f" strokeweight=".5pt">
   <v:textbox>
    <![if !mso]>
    <table cellpadding=0 cellspacing=0 width="100%">
     <tr>
      <td><![endif]>
      <div>
      <p class=MsoNormal><span lang=IN style='font-family:"Times New Roman",serif'>Disetujui<o:p></o:p></span></p>
      </div>
      <![if !mso]></td>
     </tr>
    </table>
    <![endif]></v:textbox>
  </v:shape><v:rect id="Rectangle_x0020_38" o:spid="_x0000_s1028" style='position:absolute;
   margin-left:-.5pt;margin-top:10.55pt;width:11.8pt;height:11.8pt;z-index:251659264;
   visibility:visible;mso-wrap-style:square;mso-width-percent:0;
   mso-height-percent:0;mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
   mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
   mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
   mso-position-vertical:absolute;mso-position-vertical-relative:text;
   mso-width-percent:0;mso-height-percent:0;mso-width-relative:margin;
   mso-height-relative:margin;v-text-anchor:middle' o:gfxdata="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
APMAAADpBQAAAAA=
" fillcolor="white [3212]" strokecolor="black [3213]" strokeweight="1pt"/><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-size:12.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Times New Roman",serif;mso-fareast-language:
  IN;mso-no-proof:yes'><o:p></o:p></span></b></p>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-size:12.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Times New Roman",serif;mso-fareast-language:
  IN;mso-no-proof:yes'><o:p>&nbsp;</o:p></span></b></p>
  <br style='mso-ignore:vglayout' clear=ALL>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span lang=IN
  style='font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'>Alasan :<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span lang=IN
  style='font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span lang=IN
  style='font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span lang=IN
  style='font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'>(Dikembalikan ke unit kerja pemohon)<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span lang=IN
  style='font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'>Tanggal : ...........................................<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:25;mso-yfti-lastrow:yes;height:84.15pt'>
  <td width=198 colspan=3 valign=top style='width:148.6pt;border-top:none;
  border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:none;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-bottom-alt:solid black .5pt;mso-border-bottom-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:84.15pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'>Diusulkan,<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span lang=IN style='font-family:
  "Times New Roman",serif'><?php echo $row['pemohon']; ?><o:p></o:p></span></u></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-family:"Times New Roman",serif'><?php echo $row['bagian']; ?><o:p></o:p></span></p>
  </td>
  <td width=293 colspan=3 valign=top style='width:219.7pt;border:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  mso-border-bottom-alt:solid black .5pt;mso-border-bottom-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt;height:84.15pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'>Diperiksa
  oleh,<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span lang=IN style='font-family:
  "Times New Roman",serif'>Sri Ayu Nurdianti, S.E<o:p></o:p></span></u></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-family:"Times New Roman",serif'>Sekertaris Akreditasi<o:p></o:p></span></p>
  </td>
  <td width=208 valign=top style='width:155.95pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-bottom-alt:
  solid black .5pt;mso-border-bottom-themecolor:text1;mso-border-right-alt:
  solid black .5pt;mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:84.15pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'>Disetujui
  oleh,<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span lang=IN style='font-family:
  "Times New Roman",serif'>dr. Qania Mufliani, MM<o:p></o:p></span></u></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-family:"Times New Roman",serif'>Direktur<o:p></o:p></span></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=170 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=9 style='border:none'></td>
  <td width=198 style='border:none'></td>
  <td width=76 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=208 style='border:none'></td>
 </tr>
 <![endif]>
</table>

</div>

<p class=MsoNormal><span lang=IN><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=699
 style='width:524.25pt;border-collapse:collapse;border:none;mso-border-alt:
 solid black .5pt;mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:34.9pt'>
  <td width=198 rowspan=3 valign=top style='width:148.6pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:0in;margin-left:0in;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span lang=IN style='font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:"Times New Roman",serif;mso-fareast-language:IN;
  mso-no-proof:yes'><v:shape id="Picture_x0020_0" o:spid="_x0000_i1025" type="#_x0000_t75"
   alt="logo.png" style='width:49.5pt;height:50.25pt;visibility:visible;
   mso-wrap-style:square'>
   <v:imagedata src="formppd_files/image001.png" o:title="logo"/>
  </v:shape></span><span lang=IN style='font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:"Times New Roman",serif'><o:p></o:p></span></p>
  <p class=MsoListParagraphCxSpFirst align=center style='margin-left:0in;
  mso-add-space:auto;text-align:center'><b style='mso-bidi-font-weight:normal'><span
  lang=IN style='font-size:9.0pt;mso-ansi-language:IN'>RSKG<span
  style='mso-spacerun:yes'>  </span>NY.R.A. HABIBIE<o:p></o:p></span></b></p>
  <p class=MsoListParagraphCxSpLast align=center style='margin-left:0in;
  mso-add-space:auto;text-align:center'><span lang=IN style='font-size:8.0pt;
  mso-ansi-language:IN'>Jl. Tubagus Ismail No.46 <o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Times New Roman",serif'>Bandung . 40134<o:p></o:p></span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Times New Roman",serif'>Telp. (022) 2501985 Fax. (022) 2501984</span><span
  lang=IN style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:"Times New Roman",serif'><o:p></o:p></span></p>
  </td>
  <td width=217 colspan=2 rowspan=3 style='width:163.0pt;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;border-left:none;border-bottom:solid black 1.0pt;
  mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal align=center style='margin-top:6.0pt;margin-right:0in;
  margin-bottom:6.0pt;margin-left:0in;text-align:center;line-height:150%'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-size:14.0pt;
  mso-bidi-font-size:11.0pt;line-height:150%;font-family:"Times New Roman",serif'>DETAIL
  PERUBAHAN</span></b><b style='mso-bidi-font-weight:normal'><span lang=IN
  style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
  <td width=76 valign=bottom style='width:56.7pt;border:none;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Pemohon<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.2pt;border:none;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=189 valign=bottom style='width:141.75pt;border-top:solid black 1.0pt;
  mso-border-top-themecolor:text1;border-left:none;border-bottom:none;
  border-right:solid windowtext 1.0pt;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:34.9pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['pemohon']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:27.95pt'>
  <td width=76 valign=bottom style='width:56.7pt;border:none;mso-border-left-alt:
  solid black .5pt;mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;
  height:27.95pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Bagian<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.2pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:27.95pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=189 valign=bottom style='width:141.75pt;border:none;border-right:
  solid windowtext 1.0pt;mso-border-right-alt:solid windowtext .5pt;padding:
  0in 5.4pt 0in 5.4pt;height:27.95pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['bagian']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:20.65pt'>
  <td width=76 valign=bottom style='width:56.7pt;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  mso-border-bottom-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:20.65pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>Tanggal<o:p></o:p></span></b></p>
  </td>
  <td width=19 valign=bottom style='width:14.2pt;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.65pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span lang=IN style='font-family:"Times New Roman",serif'>:<o:p></o:p></span></b></p>
  </td>
  <td width=189 valign=bottom style='width:141.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.65pt'>
  <p class=MsoNormal style='margin-top:6.0pt;margin-right:0in;margin-bottom:
  6.0pt;margin-left:0in;line-height:normal'><b style='mso-bidi-font-weight:
  normal'><span style='font-family:"Times New Roman",serif;mso-ansi-language:
  EN-US'><?php echo $row['tanggal']; ?><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:8.5pt'>
  <td width=340 colspan=2 valign=top style='width:254.9pt;border-top:none;
  border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:
  solid windowtext .5pt;background:#F2F2F2;mso-background-themecolor:background1;
  mso-background-themeshade:242;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
  <p class=MsoNormal align=center style='margin-top:2.0pt;margin-right:0in;
  margin-bottom:2.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif;
  color:black;mso-color-alt:windowtext'>Bagian yang Diubah</span></b><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
  <td width=359 colspan=4 valign=bottom style='width:269.35pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  background:#F2F2F2;mso-background-themecolor:background1;mso-background-themeshade:
  242;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
  <p class=MsoNormal align=center style='margin-top:2.0pt;margin-right:0in;
  margin-bottom:2.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif;
  color:black;mso-color-alt:windowtext'>Diubah Menjadi</span></b><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:759.05pt'>
  <td width=340 colspan=2 valign=top style='width:254.9pt;border-top:none;
  border-left:solid black 1.0pt;mso-border-left-themecolor:text1;border-bottom:
  solid black 1.0pt;mso-border-bottom-themecolor:text1;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
  mso-border-alt:solid black .5pt;mso-border-themecolor:text1;mso-border-right-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0in 5.4pt 0in 5.4pt;height:759.05pt'>
  <p class=MsoNormal align=center style='margin-top:2.0pt;margin-right:0in;
  margin-bottom:2.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p><?php echo $row['peru_bagian_revisi']; ?></o:p></span></b></p>
  </td>
  <td width=359 colspan=4 valign=bottom style='width:269.35pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
  height:759.05pt'>
  <p class=MsoNormal align=center style='margin-top:2.0pt;margin-right:0in;
  margin-bottom:2.0pt;margin-left:0in;text-align:center;line-height:normal'><b
  style='mso-bidi-font-weight:normal'><span lang=IN style='font-family:"Times New Roman",serif'><o:p><?php echo $row['peru_diubah_menjadi']; ?></o:p></span></b></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=198 style='border:none'></td>
  <td width=142 style='border:none'></td>
  <td width=76 style='border:none'></td>
  <td width=76 style='border:none'></td>
  <td width=19 style='border:none'></td>
  <td width=189 style='border:none'></td>
 </tr>
 <![endif]>
</table>

</div>

<p class=MsoNormal><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;
line-height:115%;font-family:"Times New Roman",serif;mso-ansi-language:EN-US'><o:p>&nbsp;</o:p></span></p>

</div>
<?php
  }
} 
mysqli_close($con);
?>
</body>

</html>
