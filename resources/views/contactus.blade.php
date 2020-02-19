@extends('layouts.app')
@section('content')
<div class="no-gutters row">
   <div class="pr-lg-2 col-lg-8">
      <div class="mb-3 card">
         <div class="card-header">
            <h5 class="mb-0">Contáctenos</h5>
         </div>
         <div class="bg-light card-body">
            <form class="">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group"><label for="first-name" class="">First Name</label><input id="first-name" type="text" class="form-control" value="Anthony"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><label for="last-name" class="">First Name</label><input id="last-name" type="text" class="form-control" value="Hopkins"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><label for="email" class="">Email</label><input id="email" type="email" class="form-control" value="anthony@gmail.com"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><label for="phone" class="">Phone</label><input id="phone" type="tel" class="form-control" value="+44098098304"></div>
                  </div>
                  <div class="col-12">
                     <div class="form-group"><label for="heading" class="">Heading</label><input id="heading" type="text" class="form-control" value="Software Engineer"></div>
                  </div>
                  <div class="col-12">
                     <div class="form-group"><label for="intro" class="">Intro</label><textarea id="intro" rows="13" class="form-control">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking. I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face. There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</textarea></div>
                  </div>
                  <div class="d-flex justify-content-end col-12"><button type="submit" class="btn btn-primary">Update</button></div>
               </div>
            </form>
         </div>
      </div>
      <div class="mb-3 card">
         <div class="card-header">
            <h5 class="mb-0">Experience</h5>
         </div>
         <div class="fs--1 bg-light card-body">
            <div class="d-flex align-items-center mb-4 text-primary cursor-pointer fs-0" id="togglerAddExperience">
               <span class="circle-dashed">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                     <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                  </svg>
               </span>
               <span class="ml-3">Add new experience</span>
            </div>
            <div toggler="#togglerAddExperience" class="collapse" aria-expanded="false">
               <form class="">
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="company" class="mb-0">Company</label></div>
                        <div class="col-lg-7"><input id="company" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="position" class="mb-0">Position</label></div>
                        <div class="col-lg-7"><input id="position" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="city" class="mb-0">City</label></div>
                        <div class="col-lg-7"><input id="city" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="experienceDescription" class="mb-0">Description</label></div>
                        <div class="col-lg-7"><textarea id="experienceDescription" rows="3" class="form-control-sm form-control"></textarea></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row row">
                        <div class="col-lg-7 offset-lg-3">
                           <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" id="current" class="custom-control-input"><label class="custom-control-label" for="current">I currently work here</label></div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="experienceFrom" class="mb-0">From</label></div>
                        <div class="col-lg-7">
                           <div class="rdt">
                              <input type="text" class="form-control" value="">
                              <div class="rdtPicker">
                                 <div class="rdtDays">
                                    <table>
                                       <thead>
                                          <tr>
                                             <th class="rdtPrev"><span>‹</span></th>
                                             <th class="rdtSwitch" colspan="5" data-value="1">February 2020</th>
                                             <th class="rdtNext"><span>›</span></th>
                                          </tr>
                                          <tr>
                                             <th class="dow">Su</th>
                                             <th class="dow">Mo</th>
                                             <th class="dow">Tu</th>
                                             <th class="dow">We</th>
                                             <th class="dow">Th</th>
                                             <th class="dow">Fr</th>
                                             <th class="dow">Sa</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td data-value="26" class="rdtDay rdtOld">26</td>
                                             <td data-value="27" class="rdtDay rdtOld">27</td>
                                             <td data-value="28" class="rdtDay rdtOld">28</td>
                                             <td data-value="29" class="rdtDay rdtOld">29</td>
                                             <td data-value="30" class="rdtDay rdtOld">30</td>
                                             <td data-value="31" class="rdtDay rdtOld">31</td>
                                             <td data-value="1" class="rdtDay">1</td>
                                          </tr>
                                          <tr>
                                             <td data-value="2" class="rdtDay">2</td>
                                             <td data-value="3" class="rdtDay">3</td>
                                             <td data-value="4" class="rdtDay">4</td>
                                             <td data-value="5" class="rdtDay">5</td>
                                             <td data-value="6" class="rdtDay">6</td>
                                             <td data-value="7" class="rdtDay">7</td>
                                             <td data-value="8" class="rdtDay">8</td>
                                          </tr>
                                          <tr>
                                             <td data-value="9" class="rdtDay">9</td>
                                             <td data-value="10" class="rdtDay">10</td>
                                             <td data-value="11" class="rdtDay">11</td>
                                             <td data-value="12" class="rdtDay">12</td>
                                             <td data-value="13" class="rdtDay">13</td>
                                             <td data-value="14" class="rdtDay">14</td>
                                             <td data-value="15" class="rdtDay">15</td>
                                          </tr>
                                          <tr>
                                             <td data-value="16" class="rdtDay">16</td>
                                             <td data-value="17" class="rdtDay">17</td>
                                             <td data-value="18" class="rdtDay rdtToday">18</td>
                                             <td data-value="19" class="rdtDay">19</td>
                                             <td data-value="20" class="rdtDay">20</td>
                                             <td data-value="21" class="rdtDay">21</td>
                                             <td data-value="22" class="rdtDay">22</td>
                                          </tr>
                                          <tr>
                                             <td data-value="23" class="rdtDay">23</td>
                                             <td data-value="24" class="rdtDay">24</td>
                                             <td data-value="25" class="rdtDay">25</td>
                                             <td data-value="26" class="rdtDay">26</td>
                                             <td data-value="27" class="rdtDay">27</td>
                                             <td data-value="28" class="rdtDay">28</td>
                                             <td data-value="29" class="rdtDay">29</td>
                                          </tr>
                                          <tr>
                                             <td data-value="1" class="rdtDay rdtNew">1</td>
                                             <td data-value="2" class="rdtDay rdtNew">2</td>
                                             <td data-value="3" class="rdtDay rdtNew">3</td>
                                             <td data-value="4" class="rdtDay rdtNew">4</td>
                                             <td data-value="5" class="rdtDay rdtNew">5</td>
                                             <td data-value="6" class="rdtDay rdtNew">6</td>
                                             <td data-value="7" class="rdtDay rdtNew">7</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="experienceTo" class="mb-0">To</label></div>
                        <div class="col-lg-7">
                           <div class="rdt">
                              <input type="text" class="form-control" value="">
                              <div class="rdtPicker">
                                 <div class="rdtDays">
                                    <table>
                                       <thead>
                                          <tr>
                                             <th class="rdtPrev"><span>‹</span></th>
                                             <th class="rdtSwitch" colspan="5" data-value="1">February 2020</th>
                                             <th class="rdtNext"><span>›</span></th>
                                          </tr>
                                          <tr>
                                             <th class="dow">Su</th>
                                             <th class="dow">Mo</th>
                                             <th class="dow">Tu</th>
                                             <th class="dow">We</th>
                                             <th class="dow">Th</th>
                                             <th class="dow">Fr</th>
                                             <th class="dow">Sa</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td data-value="26" class="rdtDay rdtOld">26</td>
                                             <td data-value="27" class="rdtDay rdtOld">27</td>
                                             <td data-value="28" class="rdtDay rdtOld">28</td>
                                             <td data-value="29" class="rdtDay rdtOld">29</td>
                                             <td data-value="30" class="rdtDay rdtOld">30</td>
                                             <td data-value="31" class="rdtDay rdtOld">31</td>
                                             <td data-value="1" class="rdtDay">1</td>
                                          </tr>
                                          <tr>
                                             <td data-value="2" class="rdtDay">2</td>
                                             <td data-value="3" class="rdtDay">3</td>
                                             <td data-value="4" class="rdtDay">4</td>
                                             <td data-value="5" class="rdtDay">5</td>
                                             <td data-value="6" class="rdtDay">6</td>
                                             <td data-value="7" class="rdtDay">7</td>
                                             <td data-value="8" class="rdtDay">8</td>
                                          </tr>
                                          <tr>
                                             <td data-value="9" class="rdtDay">9</td>
                                             <td data-value="10" class="rdtDay">10</td>
                                             <td data-value="11" class="rdtDay">11</td>
                                             <td data-value="12" class="rdtDay">12</td>
                                             <td data-value="13" class="rdtDay">13</td>
                                             <td data-value="14" class="rdtDay">14</td>
                                             <td data-value="15" class="rdtDay">15</td>
                                          </tr>
                                          <tr>
                                             <td data-value="16" class="rdtDay">16</td>
                                             <td data-value="17" class="rdtDay">17</td>
                                             <td data-value="18" class="rdtDay rdtToday">18</td>
                                             <td data-value="19" class="rdtDay">19</td>
                                             <td data-value="20" class="rdtDay">20</td>
                                             <td data-value="21" class="rdtDay">21</td>
                                             <td data-value="22" class="rdtDay">22</td>
                                          </tr>
                                          <tr>
                                             <td data-value="23" class="rdtDay">23</td>
                                             <td data-value="24" class="rdtDay">24</td>
                                             <td data-value="25" class="rdtDay">25</td>
                                             <td data-value="26" class="rdtDay">26</td>
                                             <td data-value="27" class="rdtDay">27</td>
                                             <td data-value="28" class="rdtDay">28</td>
                                             <td data-value="29" class="rdtDay">29</td>
                                          </tr>
                                          <tr>
                                             <td data-value="1" class="rdtDay rdtNew">1</td>
                                             <td data-value="2" class="rdtDay rdtNew">2</td>
                                             <td data-value="3" class="rdtDay rdtNew">3</td>
                                             <td data-value="4" class="rdtDay rdtNew">4</td>
                                             <td data-value="5" class="rdtDay rdtNew">5</td>
                                             <td data-value="6" class="rdtDay rdtNew">6</td>
                                             <td data-value="7" class="rdtDay rdtNew">7</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row row">
                        <div class="col-lg-7 offset-lg-3"><button disabled="" class="btn btn-primary disabled">Save</button></div>
                     </div>
                  </div>
               </form>
               <hr class="border-dashed border-bottom-0 my-4">
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="data:image/png;base64,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" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <span>
                        Big Data Engineer
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_7" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </span>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1"><a href="/pages/settings#!">Google</a></p>
                  <p class="text-1000 mb-0">Feb 18, 2013 - Present • 7 years</p>
                  <p class="text-1000 mb-0">California, USA</p>
                  <hr class="border-dashed border-bottom-0">
               </div>
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAmVBMVEUAAACsrKysrKypqammpqanp6empqalpaWmpqampqanp6empqanp6enp6elpaWnp6enp6empqampqanp6empqampqampqampqampqampqampqanp6enp6enp6empqampqampqanp6empqanp6empqalpaWmpqanp6enp6enp6enp6empqanp6enp6enp6empqanp6enp6enp6eXWNbDAAAAMnRSTlMAAwcM9urcExildv2WJ/udHcvFrEwx71NoN9FvIubXt4g8EEJH4ryRK/Kxg31hXMFZjfYCqvwAABEBSURBVHja7N3rdtJQEAXgIU24RQjQErQ0CIoNUEC73//hXN6WilZyOf6Ymf29QrKSc2bm7CNERERE9N90dqfy8PYYCfkzWZSzGF89C/kyOWVd/JQI+RFtyxUu3Aj50DsdYvypL+RA7/XjGABfAJeixWGMl/SEbJuXOQC+AD5F5xl+x0WgI71jgmtYCTLr4VWM64Rs2g1QRSxk0WiQopJCyJ5Jhqq6QtbcPMWobCpkzLlADW+FTNnNUMtAyJBoPUY9pZAdmy7qOgpZcVOivpOQEW9WaOC9kAmd4RhNjIQs6D/ir9gL8mFT4BIrwY4sx2hoJqRelKGxTEi7/gzNDYWUG3XRwp2QbpscbTwIqbaI0cZeSLXXKb7iJsCnIS6xF+jJE9r6JKTXGl9wDejVGs0wHMCGNdq7FdLqiACWQkotEcJcSKczQkg6Qiptx/g7joS7MI8RxFlIo0mB6hgOYs7NPX5gI8Chzi1+xWEQb474hnVgn+7wbzwYbttDDv4BHIumCCWdCKnzjGAehdTZ4gtWgbzqFQgm56FAfW7xE6cB/VkgoJ2QMr0EXAJ6luECj4S5skFAXY6CaNO5R0CvhZRZIqCCe0BtejkAtgH8KhFQwmtitHlI8R2PA7iUIaCCHwBtRngR02E9GCCgFWsA2owAsAjoWIYreEWIaf0U4aRMh1ZnjYCehJSJcoTTZRFYnRMC2gppM8UlZkN7Mkc4xTshbUqWAFzrJAjmlZA6dwhmxSaQQgOEEjMTTKFozzlA1+4AgJFgfmVcALjWKRBGzjwYleYsAfs25Biob4+sALkWxQjhwClApd4ghCk3AFoNEcCqL6TULdorGAenV4HW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" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <span>
                        Software Engineer
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_8" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </span>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1"><a href="/pages/settings#!">Apple</a></p>
                  <p class="text-1000 mb-0">May 18, 2012 - Jan 18, 2013 • 8 months</p>
                  <p class="text-1000 mb-0">California, USA</p>
                  <hr class="border-dashed border-bottom-0">
               </div>
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="data:image/png;base64,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" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <span>
                        Mobile App Developer
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_9" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </span>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1"><a href="/pages/settings#!">Nike</a></p>
                  <p class="text-1000 mb-0">Feb 18, 2011 - May 18, 2012 • a year</p>
                  <p class="text-1000 mb-0">Beaverton, USA</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mb-3 mb-lg-0 card">
         <div class="bg-light card-header">
            <h5 class="mb-0">Education</h5>
         </div>
         <div class="fs--1 card-body">
            <div class="d-flex align-items-center mb-4 text-primary cursor-pointer fs-0" id="togglerAddEducation">
               <span class="circle-dashed">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                     <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                  </svg>
               </span>
               <span class="ml-3">Add new education</span>
            </div>
            <div toggler="#togglerAddEducation" class="collapse" aria-expanded="false">
               <form class="">
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="school" class="mb-0">School</label></div>
                        <div class="col-lg-7"><input id="school" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="degree" class="mb-0">Degree</label></div>
                        <div class="col-lg-7"><input id="degree" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="field" class="mb-0">Field</label></div>
                        <div class="col-lg-7"><input id="field" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="location" class="mb-0">Location</label></div>
                        <div class="col-lg-7"><input id="location" type="text" class="form-control-sm form-control" value=""></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row row">
                        <div class="col-lg-7 offset-lg-3">
                           <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" id="education-current" class="custom-control-input"><label class="custom-control-label" for="education-current">I currently work here</label></div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="educationFrom" class="mb-0">From</label></div>
                        <div class="col-lg-7">
                           <div class="rdt">
                              <input type="text" class="form-control" value="">
                              <div class="rdtPicker">
                                 <div class="rdtDays">
                                    <table>
                                       <thead>
                                          <tr>
                                             <th class="rdtPrev"><span>‹</span></th>
                                             <th class="rdtSwitch" colspan="5" data-value="1">February 2020</th>
                                             <th class="rdtNext"><span>›</span></th>
                                          </tr>
                                          <tr>
                                             <th class="dow">Su</th>
                                             <th class="dow">Mo</th>
                                             <th class="dow">Tu</th>
                                             <th class="dow">We</th>
                                             <th class="dow">Th</th>
                                             <th class="dow">Fr</th>
                                             <th class="dow">Sa</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td data-value="26" class="rdtDay rdtOld">26</td>
                                             <td data-value="27" class="rdtDay rdtOld">27</td>
                                             <td data-value="28" class="rdtDay rdtOld">28</td>
                                             <td data-value="29" class="rdtDay rdtOld">29</td>
                                             <td data-value="30" class="rdtDay rdtOld">30</td>
                                             <td data-value="31" class="rdtDay rdtOld">31</td>
                                             <td data-value="1" class="rdtDay">1</td>
                                          </tr>
                                          <tr>
                                             <td data-value="2" class="rdtDay">2</td>
                                             <td data-value="3" class="rdtDay">3</td>
                                             <td data-value="4" class="rdtDay">4</td>
                                             <td data-value="5" class="rdtDay">5</td>
                                             <td data-value="6" class="rdtDay">6</td>
                                             <td data-value="7" class="rdtDay">7</td>
                                             <td data-value="8" class="rdtDay">8</td>
                                          </tr>
                                          <tr>
                                             <td data-value="9" class="rdtDay">9</td>
                                             <td data-value="10" class="rdtDay">10</td>
                                             <td data-value="11" class="rdtDay">11</td>
                                             <td data-value="12" class="rdtDay">12</td>
                                             <td data-value="13" class="rdtDay">13</td>
                                             <td data-value="14" class="rdtDay">14</td>
                                             <td data-value="15" class="rdtDay">15</td>
                                          </tr>
                                          <tr>
                                             <td data-value="16" class="rdtDay">16</td>
                                             <td data-value="17" class="rdtDay">17</td>
                                             <td data-value="18" class="rdtDay rdtToday">18</td>
                                             <td data-value="19" class="rdtDay">19</td>
                                             <td data-value="20" class="rdtDay">20</td>
                                             <td data-value="21" class="rdtDay">21</td>
                                             <td data-value="22" class="rdtDay">22</td>
                                          </tr>
                                          <tr>
                                             <td data-value="23" class="rdtDay">23</td>
                                             <td data-value="24" class="rdtDay">24</td>
                                             <td data-value="25" class="rdtDay">25</td>
                                             <td data-value="26" class="rdtDay">26</td>
                                             <td data-value="27" class="rdtDay">27</td>
                                             <td data-value="28" class="rdtDay">28</td>
                                             <td data-value="29" class="rdtDay">29</td>
                                          </tr>
                                          <tr>
                                             <td data-value="1" class="rdtDay rdtNew">1</td>
                                             <td data-value="2" class="rdtDay rdtNew">2</td>
                                             <td data-value="3" class="rdtDay rdtNew">3</td>
                                             <td data-value="4" class="rdtDay rdtNew">4</td>
                                             <td data-value="5" class="rdtDay rdtNew">5</td>
                                             <td data-value="6" class="rdtDay rdtNew">6</td>
                                             <td data-value="7" class="rdtDay rdtNew">7</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row">
                        <div class="text-lg-right col-lg-3"><label for="educationTo" class="mb-0">To</label></div>
                        <div class="col-lg-7">
                           <div class="rdt">
                              <input type="text" class="form-control" value="">
                              <div class="rdtPicker">
                                 <div class="rdtDays">
                                    <table>
                                       <thead>
                                          <tr>
                                             <th class="rdtPrev"><span>‹</span></th>
                                             <th class="rdtSwitch" colspan="5" data-value="1">February 2020</th>
                                             <th class="rdtNext"><span>›</span></th>
                                          </tr>
                                          <tr>
                                             <th class="dow">Su</th>
                                             <th class="dow">Mo</th>
                                             <th class="dow">Tu</th>
                                             <th class="dow">We</th>
                                             <th class="dow">Th</th>
                                             <th class="dow">Fr</th>
                                             <th class="dow">Sa</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td data-value="26" class="rdtDay rdtOld">26</td>
                                             <td data-value="27" class="rdtDay rdtOld">27</td>
                                             <td data-value="28" class="rdtDay rdtOld">28</td>
                                             <td data-value="29" class="rdtDay rdtOld">29</td>
                                             <td data-value="30" class="rdtDay rdtOld">30</td>
                                             <td data-value="31" class="rdtDay rdtOld">31</td>
                                             <td data-value="1" class="rdtDay">1</td>
                                          </tr>
                                          <tr>
                                             <td data-value="2" class="rdtDay">2</td>
                                             <td data-value="3" class="rdtDay">3</td>
                                             <td data-value="4" class="rdtDay">4</td>
                                             <td data-value="5" class="rdtDay">5</td>
                                             <td data-value="6" class="rdtDay">6</td>
                                             <td data-value="7" class="rdtDay">7</td>
                                             <td data-value="8" class="rdtDay">8</td>
                                          </tr>
                                          <tr>
                                             <td data-value="9" class="rdtDay">9</td>
                                             <td data-value="10" class="rdtDay">10</td>
                                             <td data-value="11" class="rdtDay">11</td>
                                             <td data-value="12" class="rdtDay">12</td>
                                             <td data-value="13" class="rdtDay">13</td>
                                             <td data-value="14" class="rdtDay">14</td>
                                             <td data-value="15" class="rdtDay">15</td>
                                          </tr>
                                          <tr>
                                             <td data-value="16" class="rdtDay">16</td>
                                             <td data-value="17" class="rdtDay">17</td>
                                             <td data-value="18" class="rdtDay rdtToday">18</td>
                                             <td data-value="19" class="rdtDay">19</td>
                                             <td data-value="20" class="rdtDay">20</td>
                                             <td data-value="21" class="rdtDay">21</td>
                                             <td data-value="22" class="rdtDay">22</td>
                                          </tr>
                                          <tr>
                                             <td data-value="23" class="rdtDay">23</td>
                                             <td data-value="24" class="rdtDay">24</td>
                                             <td data-value="25" class="rdtDay">25</td>
                                             <td data-value="26" class="rdtDay">26</td>
                                             <td data-value="27" class="rdtDay">27</td>
                                             <td data-value="28" class="rdtDay">28</td>
                                             <td data-value="29" class="rdtDay">29</td>
                                          </tr>
                                          <tr>
                                             <td data-value="1" class="rdtDay rdtNew">1</td>
                                             <td data-value="2" class="rdtDay rdtNew">2</td>
                                             <td data-value="3" class="rdtDay rdtNew">3</td>
                                             <td data-value="4" class="rdtDay rdtNew">4</td>
                                             <td data-value="5" class="rdtDay rdtNew">5</td>
                                             <td data-value="6" class="rdtDay rdtNew">6</td>
                                             <td data-value="7" class="rdtDay rdtNew">7</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group form-group">
                     <div class="row row">
                        <div class="col-lg-7 offset-lg-3"><button disabled="" class="btn btn-primary disabled">Save</button></div>
                     </div>
                  </div>
               </form>
               <hr class="border-dashed border-bottom-0 my-4">
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="/static/media/stanford.cb8dec71.png" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <a href="/pages/settings#!">
                        Stanford University
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_10" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </a>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1">Computer Science and Engineering</p>
                  <p class="text-1000 mb-0">2010 - 2014 • 4 yrs</p>
                  <p class="text-1000 mb-0">California, USA</p>
                  <hr class="border-dashed border-bottom-0">
               </div>
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="/static/media/staten.3407874b.png" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <a href="/pages/settings#!">
                        Staten Island Technical High School
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_11" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </a>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1">Higher Secondary School Certificate, Science</p>
                  <p class="text-1000 mb-0">2008 - 2010 • 2 yrs</p>
                  <p class="text-1000 mb-0">New York, USA</p>
                  <hr class="border-dashed border-bottom-0">
               </div>
            </div>
            <div class="media">
               <a href="/pages/settings#!"><img class="img-fluid" src="/static/media/tj-heigh-school.32835b29.png" width="56" alt=""></a>
               <div class="position-relative pl-3 btn-reveal-trigger media-body">
                  <h6 class="fs-0 mb-0 d-flex justify-content-between align-items-start">
                     <a href="/pages/settings#!">
                        Thomas Jefferson High School for Science and Technology
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="verified_12" style="transform-origin: 0.5em 0.625em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                 <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                     </a>
                     <button class="btn-reveal py-0 px-2 btn btn-link">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
                        </svg>
                     </button>
                  </h6>
                  <p class="mb-1">Secondary School Certificate, Science</p>
                  <p class="text-1000 mb-0">2003 - 2008 • 5 yrs</p>
                  <p class="text-1000 mb-0">Alexandria, USA</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="pl-lg-2 col-lg-4">
      <div class="sticky-top sticky-sidebar">
         <div class="mb-3 card">
            <div class="card-header">
               <h5 class="mb-0">Account Settings</h5>
            </div>
            <div class="bg-light card-body">
               <h6 class="font-weight-bold">
                  Who can see your profile ?
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question-circle" class="svg-inline--fa fa-question-circle fa-w-16 fs--2 ml-1 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="view-setting-tooltip">
                     <path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path>
                  </svg>
               </h6>
               <div class="pl-2">
                  <div class="custom-radio custom-control"><input name="view-setting" id="view-everyone" type="radio" class="custom-control-input" value="view-everyone" checked=""><label class="custom-control-label" for="view-everyone">Everyone</label></div>
                  <div class="custom-radio custom-control"><input name="view-setting" id="view-my-followers" type="radio" class="custom-control-input" value="view-my-followers"><label class="custom-control-label" for="view-my-followers">My Followers</label></div>
                  <div class="custom-radio custom-control"><input name="view-setting" id="view-only-me" type="radio" class="custom-control-input" value="view-only-me"><label class="custom-control-label" for="view-only-me">Only Me</label></div>
               </div>
               <h6 class="mt-2 font-weight-bold">
                  Who can tag you ?
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question-circle" class="svg-inline--fa fa-question-circle fa-w-16 fs--2 ml-1 text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="tag-setting-tooltip">
                     <path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path>
                  </svg>
               </h6>
               <div class="pl-2">
                  <div class="custom-radio custom-control"><input name="tag-setting" id="tag-everyone" type="radio" class="custom-control-input" value="everyone"><label class="custom-control-label" for="tag-everyone">Everyone</label></div>
                  <div class="custom-radio custom-control"><input name="tag-setting" id="tag-group-members" type="radio" class="custom-control-input" value="tag-group-members"><label class="custom-control-label" for="tag-group-members">Group Members</label></div>
                  <div class="custom-radio custom-control"><input name="tag-setting" id="tag-off" type="radio" class="custom-control-input" value="tag-off" checked=""><label class="custom-control-label" for="tag-off">Off</label></div>
               </div>
               <hr class="border-dashed border-bottom-0">
               <div class="custom-checkbox custom-control"><input id="show-followers" type="checkbox" class="custom-control-input" checked=""><label class="custom-control-label" for="show-followers">Allow users to show your followers</label></div>
               <div class="custom-checkbox custom-control"><input id="show-email" type="checkbox" class="custom-control-input" checked=""><label class="custom-control-label" for="show-email">Allow users to show your email</label></div>
               <div class="custom-checkbox custom-control"><input id="show-experiences" type="checkbox" class="custom-control-input"><label class="custom-control-label" for="show-experiences">Allow users to show your experiences</label></div>
               <hr class="border-dashed border-bottom-0">
               <div class="custom-switch custom-control"><input id="show-phone-number" type="checkbox" class="custom-control-input" checked=""><label class="custom-control-label" for="show-phone-number">Make your phone number visible</label></div>
               <div class="custom-switch custom-control"><input id="allow-follow" type="checkbox" class="custom-control-input"><label class="custom-control-label" for="allow-follow">Allow user to follow you</label></div>
            </div>
         </div>
         <div class="mb-3 card">
            <div class="card-header">
               <h5 class="mb-0">Billing Settings</h5>
            </div>
            <div class="bg-light card-body">
               <h5>Plan</h5>
               <p class="fs-0"><strong>Developer</strong>- Unlimited private repositories</p>
               <a class="btn btn-falcon-default btn-sm" href="/pages/settings#!">Update Plan</a>
            </div>
            <div class="bg-light border-top card-body">
               <h5>Payment</h5>
               <p class="fs-0">You have not added any payment.</p>
               <a class="btn btn-falcon-default btn-sm" href="/pages/settings#!">Add Payment</a>
            </div>
         </div>
         <div class="mb-3 card">
            <div class="card-header">
               <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="bg-light card-body">
               <form class="">
                  <div class="form-group"><label for="old-password" class="">Old Password</label><input id="old-password" type="password" class="form-control" value=""></div>
                  <div class="form-group"><label for="new-password" class="">New Password</label><input id="new-password" type="password" class="form-control" value=""></div>
                  <div class="form-group"><label for="confirm-password" class="">Confirm Password</label><input id="confirm-password" type="password" class="form-control" value=""></div>
                  <button disabled="" class="btn btn-primary btn-block disabled">Update Password</button>
               </form>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h5 class="mb-0">Danger Zone</h5>
            </div>
            <div class="bg-light card-body">
               <h5 class="fs-0">Transfer Ownership</h5>
               <p class="fs--1">Transfer this account to another user or to an organization where you have the ability to create repositories.</p>
               <a class="btn btn-falcon-warning btn-block" href="/pages/settings#!">Transfer</a>
               <hr class="border border-dashed my-4">
               <h5 class="fs-0">Delete this account</h5>
               <p class="fs--1">Once you delete a account, there is no going back. Please be certain.</p>
               <a class="btn btn-falcon-danger btn-block" href="/pages/settings#!">Deactivate Account</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection