<?php
/*
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * Copyright 1997-2010 Oracle and/or its affiliates. All rights reserved.
 *
 * Oracle and Java are registered trademarks of Oracle and/or its affiliates.
 * Other names may be trademarks of their respective owners.
 *
 * The contents of this file are subject to the terms of either the GNU
 * General Public License Version 2 only ("GPL") or the Common
 * Development and Distribution License("CDDL") (collectively, the
 * "License"). You may not use this file except in compliance with the
 * License. You can obtain a copy of the License at
 * http://www.netbeans.org/cddl-gplv2.html
 * or nbbuild/licenses/CDDL-GPL-2-CP. See the License for the
 * specific language governing permissions and limitations under the
 * License.  When distributing the software, include this License Header
 * Notice in each file and include the License file at
 * nbbuild/licenses/CDDL-GPL-2-CP.  Oracle designates this
 * particular file as subject to the "Classpath" exception as provided
 * by Oracle in the GPL Version 2 section of the License file that
 * accompanied this code. If applicable, add the following below the
 * License Header, with the fields enclosed by brackets [] replaced by
 * your own identifying information:
 * "Portions Copyrighted [year] [name of copyright owner]"
 *
 * Contributor(s):
 *
 * The Original Software is NetBeans. The Initial Developer of the Original
 * Software is Sun Microsystems, Inc. Portions Copyright 1997-2006 Sun
 * Microsystems, Inc. All Rights Reserved.
 *
 * If you wish your version of this file to be governed by only the CDDL
 * or only the GPL Version 2, indicate your decision by adding
 * "[Contributor] elects to include this software in this distribution
 * under the [CDDL or GPL Version 2] license." If you do not indicate a
 * single choice of license, a recipient has the option to distribute
 * your version of this file under either the CDDL, the GPL Version 2 or
 * to extend the choice of license to its licensees as provided above.
 * However, if you add GPL Version 2 code and therefore, elected the GPL
 * Version 2 license, then the option applies only if the new code is
 * made subject to such option by the copyright holder.
 */
?>
<h1>OFFER</h1>
<div id ="list">
    <?php
        $even = false;
        foreach ($properties as $property): ?>
        <div class="result">
            <div class="text">
                <h2><?php echo $property->getTitle(); ?>, <?php echo $property->getLocation()->getCity(); ?>, <?php echo $property->getDisposition(); ?>, <?php echo $property->getFormattedArea(); ?>&nbsp;m&sup2;</h2>
                <p><?php echo str_ireplace('m2', 'm&sup2;', Utils::getPerex($property->getText())); ?></p>
                <p class="price"><?php echo $property->getFormattedPrice(); ?> EUR</p>
                <br />
            </div>
            <p><a href="<?php echo url_for('property/detail?id=' .$property->getId()); ?>">More</a></p>
                <?php if (!Utils::isInFavorites($property->getId())): ?>
                    <a id="p<?php echo $property->getId(); ?>" class="fav" href="#" onclick="return addToFavorites(<?php echo $property->getId(); ?>)" title="Add to favorites">Add to favorites</a>
                <?php else: ?>
                    <a id="p<?php echo $property->getId(); ?>" class="fav-del" href="#" onclick="return removeFromFavorites(<?php echo $property->getId(); ?>)" title="Remove from favorites">Remove from favorites</a>
                <?php endif; ?>
            <br />
        </div>
        <?php
        if ($even) {
            echo '<div class="cleaner hr"></div>';
        }
        $even = !$even;
        ?>
    <?php endforeach; ?>
</div>
