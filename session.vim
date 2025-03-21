let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/code/activity-php/midterm_oop
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
let s:shortmess_save = &shortmess
if &shortmess =~ 'A'
  set shortmess=aoOA
else
  set shortmess=aoO
endif
badd +1 index.php
argglobal
%argdel
edit index.php
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
4,8fold
16,18fold
14,19fold
22,25fold
21,26fold
13,27fold
33,36fold
32,38fold
30,39fold
43,49fold
52,53fold
51,54fold
42,55fold
63,68fold
62,69fold
71,73fold
61,74fold
85,87fold
83,88fold
90,92fold
94,96fold
98,100fold
104,108fold
102,109fold
111,113fold
115,117fold
119,121fold
123,125fold
81,126fold
132,136fold
131,137fold
130,139fold
141,143fold
150,153fold
149,154fold
147,155fold
145,156fold
158,160fold
167,171fold
166,172fold
174,175fold
164,176fold
162,177fold
129,178fold
79,179fold
184,185fold
187,188fold
183,189fold
59,190fold
58,192fold
197,201fold
196,203fold
207,213fold
206,215fold
195,216fold
224,228fold
223,229fold
231,233fold
222,234fold
241,243fold
245,247fold
240,248fold
254,258fold
253,259fold
252,261fold
265,267fold
263,268fold
270,272fold
274,276fold
278,280fold
284,288fold
282,289fold
291,293fold
295,297fold
299,301fold
303,305fold
251,306fold
312,316fold
311,317fold
310,319fold
321,323fold
330,333fold
329,334fold
327,335fold
325,336fold
338,340fold
344,346fold
342,347fold
309,348fold
239,349fold
354,355fold
357,358fold
353,359fold
220,360fold
219,362fold
11,369fold
let &fdl = &fdl
let s:l = 1 - ((0 * winheight(0) + 28) / 56)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 1
normal! 07|
tabnext 1
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0 && getbufvar(s:wipebuf, '&buftype') isnot# 'terminal'
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20
let &shortmess = s:shortmess_save
let s:sx = expand("<sfile>:p:r")."x.vim"
if filereadable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &g:so = s:so_save | let &g:siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
