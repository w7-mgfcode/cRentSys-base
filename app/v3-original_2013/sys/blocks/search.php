<FORM action="search.php" method="post">
<TABLE cellspacing="2" cellpadding="0" border="0">
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Idõszak eleje:
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      <SELECT name="kev" class="input">
        <OPTION><?php echo strftime("%Y"); ?></OPTION>
        <OPTION><?php echo strftime("%Y")+1; ?></OPTION>
      </SELECT>
      <SELECT name="kho" class="input">
        <OPTION <?php if ( date ("n") == 1 ) { ?>selected="yes"<?php } ?>>01</OPTION>
        <OPTION <?php if ( date ("n") == 2 ) { ?>selected="yes"<?php } ?>>02</OPTION>
        <OPTION <?php if ( date ("n") == 3 ) { ?>selected="yes"<?php } ?>>03</OPTION>
        <OPTION <?php if ( date ("n") == 4 ) { ?>selected="yes"<?php } ?>>04</OPTION>
        <OPTION <?php if ( date ("n") == 5 ) { ?>selected="yes"<?php } ?>>05</OPTION>
        <OPTION <?php if ( date ("n") == 6 ) { ?>selected="yes"<?php } ?>>06</OPTION>
        <OPTION <?php if ( date ("n") == 7 ) { ?>selected="yes"<?php } ?>>07</OPTION>
        <OPTION <?php if ( date ("n") == 8 ) { ?>selected="yes"<?php } ?>>08</OPTION>
        <OPTION <?php if ( date ("n") == 9 ) { ?>selected="yes"<?php } ?>>09</OPTION>
        <OPTION <?php if ( date ("n") == 10 ) { ?>selected="yes"<?php } ?>>10</OPTION>
        <OPTION <?php if ( date ("n") == 11 ) { ?>selected="yes"<?php } ?>>11</OPTION>
        <OPTION <?php if ( date ("n") == 12 ) { ?>selected="yes"<?php } ?>>12</OPTION>
      </SELECT>
      <SELECT name="kna" class="input">
        <OPTION <?php if ( date ("j") == 1 ) { ?>selected="yes"<?php } ?>>01</OPTION>
        <OPTION <?php if ( date ("j") == 2 ) { ?>selected="yes"<?php } ?>>02</OPTION>
        <OPTION <?php if ( date ("j") == 3 ) { ?>selected="yes"<?php } ?>>03</OPTION>
        <OPTION <?php if ( date ("j") == 4 ) { ?>selected="yes"<?php } ?>>04</OPTION>
        <OPTION <?php if ( date ("j") == 5 ) { ?>selected="yes"<?php } ?>>05</OPTION>
        <OPTION <?php if ( date ("j") == 6 ) { ?>selected="yes"<?php } ?>>06</OPTION>
        <OPTION <?php if ( date ("j") == 7 ) { ?>selected="yes"<?php } ?>>07</OPTION>
        <OPTION <?php if ( date ("j") == 8 ) { ?>selected="yes"<?php } ?>>08</OPTION>
        <OPTION <?php if ( date ("j") == 9 ) { ?>selected="yes"<?php } ?>>09</OPTION>
        <OPTION <?php if ( date ("j") == 10 ) { ?>selected="yes"<?php } ?>>10</OPTION>
        <OPTION <?php if ( date ("j") == 11 ) { ?>selected="yes"<?php } ?>>11</OPTION>
        <OPTION <?php if ( date ("j") == 12 ) { ?>selected="yes"<?php } ?>>12</OPTION>
        <OPTION <?php if ( date ("j") == 13 ) { ?>selected="yes"<?php } ?>>13</OPTION>
        <OPTION <?php if ( date ("j") == 14 ) { ?>selected="yes"<?php } ?>>14</OPTION>
        <OPTION <?php if ( date ("j") == 15 ) { ?>selected="yes"<?php } ?>>15</OPTION>
        <OPTION <?php if ( date ("j") == 16 ) { ?>selected="yes"<?php } ?>>16</OPTION>
        <OPTION <?php if ( date ("j") == 17 ) { ?>selected="yes"<?php } ?>>17</OPTION>
        <OPTION <?php if ( date ("j") == 18 ) { ?>selected="yes"<?php } ?>>18</OPTION>
        <OPTION <?php if ( date ("j") == 19 ) { ?>selected="yes"<?php } ?>>19</OPTION>
        <OPTION <?php if ( date ("j") == 20 ) { ?>selected="yes"<?php } ?>>20</OPTION>
        <OPTION <?php if ( date ("j") == 21 ) { ?>selected="yes"<?php } ?>>21</OPTION>
        <OPTION <?php if ( date ("j") == 22 ) { ?>selected="yes"<?php } ?>>22</OPTION>
        <OPTION <?php if ( date ("j") == 23 ) { ?>selected="yes"<?php } ?>>23</OPTION>
        <OPTION <?php if ( date ("j") == 24 ) { ?>selected="yes"<?php } ?>>24</OPTION>
        <OPTION <?php if ( date ("j") == 25 ) { ?>selected="yes"<?php } ?>>25</OPTION>
        <OPTION <?php if ( date ("j") == 26 ) { ?>selected="yes"<?php } ?>>26</OPTION>
        <OPTION <?php if ( date ("j") == 27 ) { ?>selected="yes"<?php } ?>>27</OPTION>
        <OPTION <?php if ( date ("j") == 28 ) { ?>selected="yes"<?php } ?>>28</OPTION>
        <OPTION <?php if ( date ("j") == 29 ) { ?>selected="yes"<?php } ?>>29</OPTION>
        <OPTION <?php if ( date ("j") == 30 ) { ?>selected="yes"<?php } ?>>30</OPTION>
        <OPTION <?php if ( date ("j") == 31 ) { ?>selected="yes"<?php } ?>>31</OPTION>
      </SELECT>
      <BR>(óra, perc)  <SELECT name="kor" class="input">
        <OPTION>00</OPTION>
        <OPTION>01</OPTION>
        <OPTION>02</OPTION>
        <OPTION>03</OPTION>
        <OPTION>04</OPTION>
        <OPTION>05</OPTION>
        <OPTION>06</OPTION>
        <OPTION>07</OPTION>
        <OPTION>08</OPTION>
        <OPTION selected="yes">09</OPTION>
        <OPTION>10</OPTION>
        <OPTION>11</OPTION>
        <OPTION>12</OPTION>
        <OPTION>13</OPTION>
        <OPTION>14</OPTION>
        <OPTION>15</OPTION>
        <OPTION>16</OPTION>
        <OPTION>17</OPTION>
        <OPTION>18</OPTION>
        <OPTION>19</OPTION>
        <OPTION>20</OPTION>
        <OPTION>21</OPTION>
        <OPTION>22</OPTION>
        <OPTION>23</OPTION>
      </SELECT>
      <SELECT name="kpe" class="input">
        <OPTION>00</OPTION>
        <OPTION>01</OPTION>
        <OPTION>02</OPTION>
        <OPTION>03</OPTION>
        <OPTION>04</OPTION>
        <OPTION>05</OPTION>
        <OPTION>06</OPTION>
        <OPTION>07</OPTION>
        <OPTION>08</OPTION>
        <OPTION>09</OPTION>
        <OPTION>10</OPTION>
        <OPTION>11</OPTION>
        <OPTION>12</OPTION>
        <OPTION>13</OPTION>
        <OPTION>14</OPTION>
        <OPTION>15</OPTION>
        <OPTION>16</OPTION>
        <OPTION>17</OPTION>
        <OPTION>18</OPTION>
        <OPTION>19</OPTION>
        <OPTION>20</OPTION>
        <OPTION>21</OPTION>
        <OPTION>22</OPTION>
        <OPTION>23</OPTION>
        <OPTION>24</OPTION>
        <OPTION>25</OPTION>
        <OPTION>26</OPTION>
        <OPTION>27</OPTION>
        <OPTION>28</OPTION>
        <OPTION>29</OPTION>
        <OPTION>30</OPTION>
        <OPTION>31</OPTION>
        <OPTION>32</OPTION>
        <OPTION>33</OPTION>
        <OPTION>34</OPTION>
        <OPTION>35</OPTION>
        <OPTION>36</OPTION>
        <OPTION>37</OPTION>
        <OPTION>38</OPTION>
        <OPTION>39</OPTION>
        <OPTION>40</OPTION>
        <OPTION>41</OPTION>
        <OPTION>42</OPTION>
        <OPTION>43</OPTION>
        <OPTION>44</OPTION>
        <OPTION>45</OPTION>
        <OPTION>46</OPTION>
        <OPTION>47</OPTION>
        <OPTION>48</OPTION>
        <OPTION>49</OPTION>
        <OPTION>50</OPTION>
        <OPTION>51</OPTION>
        <OPTION>52</OPTION>
        <OPTION>53</OPTION>
        <OPTION>54</OPTION>
        <OPTION>55</OPTION>
        <OPTION>56</OPTION>
        <OPTION>57</OPTION>
        <OPTION>58</OPTION>
        <OPTION>59</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      Idõszak vége:
    </TD>
  </TR>
  <TR>
    <TD style="font-size: 11px; font-weight: bold;">
      <SELECT name="vev" class="input">
        <OPTION><?php echo strftime("%Y"); ?></OPTION>
        <OPTION><?php echo strftime("%Y")+1; ?></OPTION>
      </SELECT>
      <SELECT name="vho" class="input">
        <OPTION <?php if ( date ("n") == 1 ) { ?>selected="yes"<?php } ?>>01</OPTION>
        <OPTION <?php if ( date ("n") == 2 ) { ?>selected="yes"<?php } ?>>02</OPTION>
        <OPTION <?php if ( date ("n") == 3 ) { ?>selected="yes"<?php } ?>>03</OPTION>
        <OPTION <?php if ( date ("n") == 4 ) { ?>selected="yes"<?php } ?>>04</OPTION>
        <OPTION <?php if ( date ("n") == 5 ) { ?>selected="yes"<?php } ?>>05</OPTION>
        <OPTION <?php if ( date ("n") == 6 ) { ?>selected="yes"<?php } ?>>06</OPTION>
        <OPTION <?php if ( date ("n") == 7 ) { ?>selected="yes"<?php } ?>>07</OPTION>
        <OPTION <?php if ( date ("n") == 8 ) { ?>selected="yes"<?php } ?>>08</OPTION>
        <OPTION <?php if ( date ("n") == 9 ) { ?>selected="yes"<?php } ?>>09</OPTION>
        <OPTION <?php if ( date ("n") == 10 ) { ?>selected="yes"<?php } ?>>10</OPTION>
        <OPTION <?php if ( date ("n") == 11 ) { ?>selected="yes"<?php } ?>>11</OPTION>
        <OPTION <?php if ( date ("n") == 12 ) { ?>selected="yes"<?php } ?>>12</OPTION>
      </SELECT>
      <SELECT name="vna" class="input">
        <OPTION <?php if ( date ("j") == 1 ) { ?>selected="yes"<?php } ?>>01</OPTION>
        <OPTION <?php if ( date ("j") == 2 ) { ?>selected="yes"<?php } ?>>02</OPTION>
        <OPTION <?php if ( date ("j") == 3 ) { ?>selected="yes"<?php } ?>>03</OPTION>
        <OPTION <?php if ( date ("j") == 4 ) { ?>selected="yes"<?php } ?>>04</OPTION>
        <OPTION <?php if ( date ("j") == 5 ) { ?>selected="yes"<?php } ?>>05</OPTION>
        <OPTION <?php if ( date ("j") == 6 ) { ?>selected="yes"<?php } ?>>06</OPTION>
        <OPTION <?php if ( date ("j") == 7 ) { ?>selected="yes"<?php } ?>>07</OPTION>
        <OPTION <?php if ( date ("j") == 8 ) { ?>selected="yes"<?php } ?>>08</OPTION>
        <OPTION <?php if ( date ("j") == 9 ) { ?>selected="yes"<?php } ?>>09</OPTION>
        <OPTION <?php if ( date ("j") == 10 ) { ?>selected="yes"<?php } ?>>10</OPTION>
        <OPTION <?php if ( date ("j") == 11 ) { ?>selected="yes"<?php } ?>>11</OPTION>
        <OPTION <?php if ( date ("j") == 12 ) { ?>selected="yes"<?php } ?>>12</OPTION>
        <OPTION <?php if ( date ("j") == 13 ) { ?>selected="yes"<?php } ?>>13</OPTION>
        <OPTION <?php if ( date ("j") == 14 ) { ?>selected="yes"<?php } ?>>14</OPTION>
        <OPTION <?php if ( date ("j") == 15 ) { ?>selected="yes"<?php } ?>>15</OPTION>
        <OPTION <?php if ( date ("j") == 16 ) { ?>selected="yes"<?php } ?>>16</OPTION>
        <OPTION <?php if ( date ("j") == 17 ) { ?>selected="yes"<?php } ?>>17</OPTION>
        <OPTION <?php if ( date ("j") == 18 ) { ?>selected="yes"<?php } ?>>18</OPTION>
        <OPTION <?php if ( date ("j") == 19 ) { ?>selected="yes"<?php } ?>>19</OPTION>
        <OPTION <?php if ( date ("j") == 20 ) { ?>selected="yes"<?php } ?>>20</OPTION>
        <OPTION <?php if ( date ("j") == 21 ) { ?>selected="yes"<?php } ?>>21</OPTION>
        <OPTION <?php if ( date ("j") == 22 ) { ?>selected="yes"<?php } ?>>22</OPTION>
        <OPTION <?php if ( date ("j") == 23 ) { ?>selected="yes"<?php } ?>>23</OPTION>
        <OPTION <?php if ( date ("j") == 24 ) { ?>selected="yes"<?php } ?>>24</OPTION>
        <OPTION <?php if ( date ("j") == 25 ) { ?>selected="yes"<?php } ?>>25</OPTION>
        <OPTION <?php if ( date ("j") == 26 ) { ?>selected="yes"<?php } ?>>26</OPTION>
        <OPTION <?php if ( date ("j") == 27 ) { ?>selected="yes"<?php } ?>>27</OPTION>
        <OPTION <?php if ( date ("j") == 28 ) { ?>selected="yes"<?php } ?>>28</OPTION>
        <OPTION <?php if ( date ("j") == 29 ) { ?>selected="yes"<?php } ?>>29</OPTION>
        <OPTION <?php if ( date ("j") == 30 ) { ?>selected="yes"<?php } ?>>30</OPTION>
        <OPTION <?php if ( date ("j") == 31 ) { ?>selected="yes"<?php } ?>>31</OPTION>
      </SELECT>
      <BR>(óra , perc)<SELECT name="vor" class="input">
        <OPTION>00</OPTION>
        <OPTION>01</OPTION>
        <OPTION>02</OPTION>
        <OPTION>03</OPTION>
        <OPTION>04</OPTION>
        <OPTION>05</OPTION>
        <OPTION>06</OPTION>
        <OPTION>07</OPTION>
        <OPTION>08</OPTION>
        <OPTION>09</OPTION>
        <OPTION>10</OPTION>
        <OPTION>11</OPTION>
        <OPTION>12</OPTION>
        <OPTION>13</OPTION>
        <OPTION>14</OPTION>
        <OPTION>15</OPTION>
        <OPTION>16</OPTION>
        <OPTION>17</OPTION>
        <OPTION selected="yes">18</OPTION>
        <OPTION>19</OPTION>
        <OPTION>20</OPTION>
        <OPTION>21</OPTION>
        <OPTION>22</OPTION>
        <OPTION>23</OPTION>
      </SELECT>
      <SELECT name="vpe" class="input">
        <OPTION>00</OPTION>
        <OPTION>01</OPTION>
        <OPTION>02</OPTION>
        <OPTION>03</OPTION>
        <OPTION>04</OPTION>
        <OPTION>05</OPTION>
        <OPTION>06</OPTION>
        <OPTION>07</OPTION>
        <OPTION>08</OPTION>
        <OPTION>09</OPTION>
        <OPTION>10</OPTION>
        <OPTION>11</OPTION>
        <OPTION>12</OPTION>
        <OPTION>13</OPTION>
        <OPTION>14</OPTION>
        <OPTION>15</OPTION>
        <OPTION>16</OPTION>
        <OPTION>17</OPTION>
        <OPTION>18</OPTION>
        <OPTION>19</OPTION>
        <OPTION>20</OPTION>
        <OPTION>21</OPTION>
        <OPTION>22</OPTION>
        <OPTION>23</OPTION>
        <OPTION>24</OPTION>
        <OPTION>25</OPTION>
        <OPTION>26</OPTION>
        <OPTION>27</OPTION>
        <OPTION>28</OPTION>
        <OPTION>29</OPTION>
        <OPTION>30</OPTION>
        <OPTION>31</OPTION>
        <OPTION>32</OPTION>
        <OPTION>33</OPTION>
        <OPTION>34</OPTION>
        <OPTION>35</OPTION>
        <OPTION>36</OPTION>
        <OPTION>37</OPTION>
        <OPTION>38</OPTION>
        <OPTION>39</OPTION>
        <OPTION>40</OPTION>
        <OPTION>41</OPTION>
        <OPTION>42</OPTION>
        <OPTION>43</OPTION>
        <OPTION>44</OPTION>
        <OPTION>45</OPTION>
        <OPTION>46</OPTION>
        <OPTION>47</OPTION>
        <OPTION>48</OPTION>
        <OPTION>49</OPTION>
        <OPTION>50</OPTION>
        <OPTION>51</OPTION>
        <OPTION>52</OPTION>
        <OPTION>53</OPTION>
        <OPTION>54</OPTION>
        <OPTION>55</OPTION>
        <OPTION>56</OPTION>
        <OPTION>57</OPTION>
        <OPTION>58</OPTION>
        <OPTION>59</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR>
    <TD>
      <INPUT type="submit" value="OK" class="button">
    </TD>
  </TR>
</TABLE>
</FORM>