<!-- main start -->
    <div id="main" class="clearfix">
        <!-- content start -->
        <div id="content" class="con">
            <h3><?php echo $page['post_title']?></h3>
            <div class="section">
              <?php echo $page['post_content']?>
               <!--<table summary="主な設備、機械 (Main equipment &amp; machines)" class="td_middle tbl_equipment">
               <tr>
                   <th class="col1">機械の種類 <br />(Type of machine)</th>
                   <th class="col2">メーカー <br />(Manufacturer)</th>
                   <th class="col3">型式 <br />(Model)</th>
                   <th class="col4">数 <br />(QTY)</th>
               </tr>
               <tr>
                   <td>CAD</td>
                   <td>KURASHIKI（倉敷機械）</td>
                   <td>MYPAC</td>
                   <td class="center">3</td>
               </tr>
               <tr>
                   <td>CAD</td>
                   <td>SIEMENS（シーメンス）</td>
                   <td>UNIGRAPHICS</td>
                   <td class="center">4</td>
               </tr>
               <tr>
                   <td>CAM</td>
                   <td>CIMATRON（シマトロン）</td>
                   <td>CIMATRON E9.0</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>SIMULATION（切削シュミレーション）</td>
                   <td>NASUKA VIEW（ナスカビュー）</td>
                   <td>GODO SOLUTION</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td rowspan="2">WIRE ELECTRIC DISCHARGE MACHINING <br />
                       <span class="fontS">（ワイヤー放電加工機）</span></td>
                   <td rowspan="2">MITSUBISHI（三菱電機）</td>
                   <td>FA10S ADVANCE</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>TRA9S</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td rowspan="2">CNC MACHINING CENTER（縦型マシニングセンタ）</td>
                   <td>MITSUBISHI（三菱重工）</td>
                   <td>M-V5CN</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MAKINO（牧野フライス）</td>
                   <td>F3</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td rowspan="2">ELECTRIC DISCHARGE MACHINE（放電加工機）</td>
                   <td>MITSUBISHI（三菱電機）</td>
                   <td>EA-8</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>SODICK（ソディック）</td>
                   <td>AD35L</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>CNC MILLING MACHINE（NCフライス盤）</td>
                   <td>HAMAI（浜井産業）</td>
                   <td>MAC-70P</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MILLING MACHINE（汎用フライス盤）</td>
                   <td>MAKINO（牧野フライス）</td>
                   <td>KSA-55</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MILLING MACHINE（タレット型フライス盤）</td>
                   <td rowspan="2">SHIZUOKA（静岡鉄鋼所）</td>
                   <td>ST-BC</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MILLING MACHINE（タレット型複合フライス盤）</td>
                   <td>VHR-G</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MILLING MACHINE（汎用フライス盤）</td>
                   <td>OSAKA（大阪鉄鋼）</td>
                   <td>MH-4V</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>HIGH SPEED PRECISION CUTTING MACHINE <br />
                       （高速精密切断機）</td>
                   <td>HEIWA TECHNICA（平和テクニカ）</td>
                   <td>FINE CUT31</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>LATHE MACHINE（汎用旋盤加工機）</td>
                   <td>OKUMA（オークマ）</td>
                   <td>LS</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td rowspan="2">URFACE GRINDING MACHINE（精密平面研削盤）</td>
                   <td>HITACHI（日立ビアメカニクス）</td>
                   <td>GHL-B406</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>KURODA（黒田鉄工）</td>
                   <td>GS-BM3L</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>SMALL-HOLE DRILLING EDM MACHINE（細穴放電加工機）</td>
                   <td>SODICK（ソディック）</td>
                   <td>K1C</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>DIAL DRILLING MACHINE（ラジアルボール盤）</td>
                   <td>AZUMA（東鉄工所）</td>
                   <td>AMK-850H</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>BENCH DRILLING MACHINE（ボール盤）</td>
                   <td>KIRA（吉良鉄鋼）</td>
                   <td>KID-420</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>CONTOUR MACHINE（コンタマシン）</td>
                   <td>NCC（ニコテック）</td>
                   <td>NCC-500</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>UNIVERSAL TOOL GRINDER（万能工具研削盤）</td>
                   <td>ITO（伊藤製作所）</td>
                   <td>DP-520</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>BENCH GRINDER（卓上グラインダー）</td>
                   <td>MATSUSHITA（松下電動工具）</td>
                   <td>RD-750</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>SUPER PRECISION WELDER （精密溶接機）</td>
                   <td rowspan="2">JTE（日本テクノエンジニアリング）</td>
                   <td>YW210</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MOLD WELDING MACHINE（溶接機）</td>
                   <td>2000</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>ARGON WELDING MACHINE（アルゴン溶接機）</td>
                   <td>DAIHEN（ダイヘン）</td>
                   <td>VRTP-200</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td rowspan="11">NJECTION MOLDING MACHINE（射出成形機）</td>
                   <td>NIIGATA（新潟鉄工所）</td>
                   <td>CN50 A-III</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>NIGATA（新潟マシンテクノ）</td>
                   <td>MD50X</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>JSW（日本製鋼所）</td>
                   <td>J55AD-60H</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>HISHIYA（菱屋）</td>
                   <td>VNT-70PC</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>CHEN DE</td>
                   <td>CJ80M3V</td>
                   <td class="center">2</td>
               </tr>
               <tr>
                   <td>NIIGATA（新潟マシンテクノ）</td>
                   <td>MD100X12.7</td>
                   <td class="center">2</td>
               </tr>
               <tr>
                   <td>JSW（日本製鋼所）</td>
                   <td>J110AD-110H</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>CHEN DE</td>
                   <td>CJ120M3V</td>
                   <td class="center">2</td>
               </tr>
               <tr>
                   <td>NIIGATA（新潟鉄工所）</td>
                   <td>CN130 A-III</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>JSW（日本製鋼所）</td>
                   <td>J180AD-300H</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>JSW（日本製鋼所）</td>
                   <td>J350AD-890H</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>MICROSCOPE（顕微鏡）</td>
                   <td>TOPCON（トプコン）</td>
                   <td>TMM-130EN</td>
                   <td class="center">1</td>
               </tr>
               <tr>
                   <td>CNC VISION MEASURING MACHINE（画像測定器）</td>
                   <td>MITSUTOYO（ミツトヨ）</td>
                   <td>QS250Z</td>
                   <td class="center">1</td>
               </tr>
               </table>-->
            </div>
        </div>
        <!-- content end -->