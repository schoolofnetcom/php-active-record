<?php

namespace ErikFig\ActiveRecordOrm\Models;

abstract class Model
{
    use EntityTrait;
    use RepositoryTrait;
}